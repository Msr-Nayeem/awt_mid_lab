<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('home');
    }
    public function service(){
        $list = array("Web app develepment", "Desktop app development", "Enterprise application", "Mobile app develpoment");
        return view('service')->with('list', $list);
    }
    public function team(){
        $member = array(
            'web app'=>"Msr Nayeem",
            'desktop app'=>"shahidur",
            'mobile app'=>"rahman"
        );
        return view('team')->with('member', $member);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        $c1 = new contact("shahidur","dinajpur", "shahidur@gmail.com");
        $c2 = new contact("rahman","dhaka", "rahman@gmail.com");
        $c3 = new contact("nayeem","dinajpur", "nayeem@gmail.com");
        $contacts = array($c1, $c2, $c3);
        return view('contact')->with('contact', $contacts);
    }
}

class contact{
    var $namee;
    var $adress;
    var $mail;

    function __construct($name,$address, $mail)
    {
        $this->namee=$name; 
        $this->address=$address;       
        $this->mail=$mail;       
    }
}
