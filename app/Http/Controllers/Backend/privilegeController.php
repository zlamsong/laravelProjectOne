<?php

namespace App\Http\Controllers\Backend;
use App\Mail\test;
use App\Models\Privilege;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;


class privilegeController extends BackendController
{
    public function index(){
        $this->data('privilegeData', Privilege::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'privileges.privilege', $this->data);
    }

    public function addPrivilege(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'privilege_name' => 'required|min:4|max:20|unique:privileges,privilege_name',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            $privilegeObject = new Privilege();
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->save()){

                Mail::to('zlamsong22@gmail.com')->send(new test());

                return redirect()->route('privilege')->with('success','New privilege added.');
            }
        }
//        if($request->isMethod('post')){
//            $this->validate($request,[
//                'privilege_name' => 'required|min:4|max:20|unique:privileges,privilege_name'
//            ],
//                [
//                    'name.required' => 'Name xaina timro??'
//                ]);
//            $data = [
//                'privilege_name' => $request->privilege_name,
//                'created_at' => Carbon::now()->toDateTimeString(),
//                'updated_at' => Carbon::now()->toDateTimeString()
//            ];
//            $result = DB::table('privileges')->insert($data);
//            if($result){
//                return redirect()->route('privilege')->with('success', 'New privilege added.');
//            }else{
//                return redirect()->route('index')->with('error', 'data is not inserted');
//            }
//        }
    }

    public function deletePrivilege($criteria){
//        $id = $request->criteria;
//        $db=DB::table('privileges')->where('id', $id)->delete();
//        if($db==true){
//            return redirect()->route('privilege')->with('success', 'data is deleted');
//        }
//        else
//        {
//            return redirect()->route('privilege')->with('error', 'data is not deleted');
//        }
        $id = $criteria;
        if (DB::table('privileges')->where('id','=', $id)->delete()){
            return redirect()->route('privilege')->with('success', 'privilege is deleted');
        }


    }

    public  function editPrivilege($id){
        $findData = Privilege::findOrFail($id);
        $this->data('privilegeData', $findData);
        return view($this->_pagepath.'privileges.edit-privilege', $this->data);
    }

    public function editPrivilegeAction(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $criteria = $request->criteria;
            $this->validate($request,[
                'privilege_name' => 'required|min:4|max:20|',[
                    Rule::unique('privileges','privilege_name')->ignore($criteria)
                ]
            ]);
            $privilegeObject = Privilege::findOrFail($criteria);
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->update()){
                return redirect()->route('privilege')->with('success','privilege has been updated.');
            }
        }

    }

    public  function updatePrivilegeStatus(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $criteria = $request-> criteria;
            $privilegeObject = Privilege::findOrFail($criteria);

            if(isset($_POST['active'])){
                $message = 'status has been di-activated';
                $privilegeObject->status = 0;
            }
            if(isset($_POST['inactive'])){
                $message = 'status has been activated';
                $privilegeObject->status = 1;
            }
            if($privilegeObject->update()){
                return redirect()->route('privilege')->with('success', $message);
            }
        }

    }
}
