<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends FrontendController
{

    public function index(){
        $this->data('title', $this->makeTitle('home'));


        $this->data('x', 20);
        return view($this->_pagepath.'home.home', $this->data);
    }

    public function about(){
        $this->data('title', $this->makeTitle('about'));


        $this->data('x', 20);
        return view($this->_pagepath.'about.about', $this->data);
    }

    public function userLogin(Request $request){
        if($request->isMethod('get')){
            return view($this->_frontendpath.'login.login');
        }
        if($request->isMethod('post')){
            $username=$request->username;
            $password=$request->password;

            $remember=isset($request->remember)? true: false;

            if (Auth::attempt((['username' => $username, 'password' => $password]))){
                return redirect()->intended(route('dashboard'))->with('success','Welcome'.' '.$username);
            }else{
                return redirect()->back()->with('error', 'Wrong username or password');
            }
        }
    }


}
