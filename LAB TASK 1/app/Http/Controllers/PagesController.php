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
}
