<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();

        return view('user.profile.index')->with(['admin' => $admin]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('user.profile.password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $admin = Auth::user();

        $admin->name = $data['name'];
        $admin->country = $data['country'];
        // $admin->last_name = $data['last_name'];
        $admin->save();

        if($data['email'] != $admin->email) {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
            $admin->email = $data['email'];
            $admin->email_verified_at = null;
            $admin->save();
            // $admin->sendEmailVerificationNotification();
        }

        if($data['phone'] != $admin->phone) {
            $this->validate($request, [
                'phone' => ['nullable', 'string', 'regex:/^(961(3|70|71)|(03|70|71))\d{6}$/'],
            ]);

            $admin->phone = $data['phone'];
            $admin->save();
        }

        return redirect('/seller/profile')->with('message', 'Profile Updated');
    }

    /**
     * Update the admins password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->withErrors("Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->withErrors("New Password cannot be same as your current password. Please choose a different password.");
        }

        //Change Password
        $admin = Auth::user();
        $admin->password = bcrypt($request->get('password'));
        $admin->save();

        return redirect()->back()->with("message","Password changed successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a validator for an incoming main update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);
    }

    public function storeSurvey(Request $request){
        $survey = new Survey();
        $survey->seller_id = auth()->user()->id;
        $survey->q1 = $request->q1;
        $survey->q2 = $request->q2;
        $survey->q3 = $request->q3;

        if($survey->save()){
            // update the user status
            $user = User::find(auth()->user()->id);
            $user->survey = 1;
            $user->phone = $request->phone;
            if($user->save()){
                
                return redirect()->route('home')->with('success', 'Thanks, Your Dashboard is ready!');

            }
        }
        return redirect()->route('home')->with('error', 'Something went wrong, please try again!');

    }
}
