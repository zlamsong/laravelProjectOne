<?php

namespace App\Http\Controllers\Backend;

use App\Mail\test;
use App\Models\Admin;
use App\Models\Privilege;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminController extends BackendController
{
    public function index()
    {
//        $users =Admin::all();
//        foreach ($users as $user){
//            echo $user->username;
//            echo '<br>';
//            foreach ($user->privilege as $priv){
//                echo $priv->privilege_name;
//            }
//            echo '<hr>';
//        }

//        $privileges =privilege::all();
////        foreach ($privileges as $pri){
////
////            echo '<br>';
////            foreach ($pri->user as $ur){
////                echo $ur->name;
////            }
////            echo '<hr>';
////            echo $pri->privilege_name;
////        }
///
//      $users = DB::table('admins')
//            ->leftjoin('manage_privilege', 'admins.id', '=', 'manage_privilege.admin_id')
//            ->leftjoin('privileges', 'manage_privilege.id', '=', 'manage_privilege.privilege_id')
//            ->select('admins.*', 'privileges.privilege_name')
//            ->get();
//      dump($users);
        $this->data('adminsData', Admin::all());
        $this->data('title', $this->makeTitle('users'));
        return view($this->_pagepath . 'users.users', $this->data);
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('privilegeData', Privilege::where('status', '=', '1')->get()); //for showing only active privileges on privilege field of add user form

            $this->data('title', $this->makeTitle('add-user'));
            return view($this->_pagepath . 'users.add-user', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required|min:5|max:20|unique:admins,username',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:6|max:20|confirmed',
                'upload' => 'required|mimes:jpeg,png,gif,jpg'
            ]);
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/users/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $admin->image = $imageName;
            }
            $privilegeId = $request->privilege;
            $totalprivilegeId = count($privilegeId);
            $increment = 0;
            if ($admin->save()) {
                $lastInsertId = $admin->id;

                foreach ($privilegeId as $id) {
                    $pri['admin_id'] = $lastInsertId;
                    $pri['privilege_id'] = $id;
                    $pri['created_at'] = Carbon::now()->toDateTimeString();
                    $pri['updated_at'] = Carbon::now()->toDateTimeString();

                    if (DB::table('manage_privilege')->insert($pri)) {
                        $increment++;
                    }
                    if ($totalprivilegeId == $increment) {

                        return redirect()->route('users')->with('success', 'Users has been added');
                    }
                }
            }


        }

    }

    public function deleteWithFiles($criteria)
    {
        $id = $criteria;
        $findData = Admin::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/users/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;

    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        DB::table('manage_privilege')->where('admin_id', '=', $id)->delete();
        $findData = Admin::findOrFail($id);
        if ($this->deleteWithFiles($id) && $findData->delete()) {
            return redirect()->route('users')->with('success', 'user has been deleted');
        }

    }

    public function editUser(Request $request)
    {
        $id = $request->id;
        $findData = Admin::findOrFail($id);
        $this->data('userData', $findData);
        return view($this->_pagepath . 'users.edit-user', $this->data);

    }

    public function editUserAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required|min:5|max:20|', [
                    Rule::unique('admins', 'username')->ignore($criteria)
                ],
                'email' => 'required|email|', [
                    Rule::unique('admins', 'email')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg'
            ]);
            $admin = Admin::findOrFail($criteria);
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/users/');

                if ($this->deleteWithFiles($criteria) && $file->move($UploadPath, $imageName)) {
                    $admin->image = $imageName;
                }
            }

            if ($admin->update()) {
                return redirect()->route('users')->with('success', 'Info has been updated');
            }
        }
    }

    public function updateUserStatus(Request $request){
        if($request->isMethod('post')){
            $criteria = $request-> criteria;
            $adminObject = Admin::findOrFail($criteria);

            if(isset($_POST['active'])){
                $message = 'status has been di-activated';
                $adminObject->status = 0;
            }
            if(isset($_POST['inactive'])){
                $message = 'status has been activated';
                $adminObject->status = 1;
            }
            if($adminObject->update()){
                return redirect()->route('users')->with('success', $message);
            }
        }
    }


    public function login(Request $request){
        if($request->isMethod('get')){
            return view($this->_backendpath.'login.login');
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

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('login'));
    }

//    public function resetLinkEmail(Request $request){
//        if($request->isMethod('get')){
//            return view($this->_backendpath.'resetpassword.resetpassword');
//        }
//        if($request->isMethod('post')){
//            $email=$request->email;
//          if (Auth::attempt((['email' => $email]))) {
//              Mail::to('zlamsong22@gmail.com')->send(new test());
//              echo 'success';
//////              $data['username'] = 'admin';
//////              Mail::send(['text'=>'mail'], $data, function ($message){
//////                  $message->to('$email', 'testing')->subject('testing mail');
//////                  $message->from('zlamsong22@gmail.com', 'test');
//////              });
////              echo 'success';
//
//          }
//        }
//
//    }
//    public function resetFrom(Request $request){
//        if($request->isMethod('get')){
//            return view($this->_backendpath.'resetpassword.resetform');
//        }
//        if($request->isMethod('post')){
//            $email=$request->email;
//
//            if (Auth::attempt((['email' => $email]))){
//                return redirect()->intended(route('dashboard'))->with('success','Welcome'.' '.$username);
//            }else{
//                return redirect()->back()->with('error', 'Wrong username or password');
//            }
//        }
//    }

}
