<?php

namespace App\Http\Controllers;

use App\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class StuffController extends Controller
{

    public function login()
    {
        return view('stuff.login');
    }


    public function postlogin(Request $request)
    {
        $this->validate($request ,[
            'username' => 'required',
            'password' => 'required'
        ]);


        if (Auth::guard('stuff')->attempt(['username' => $request->username, 'password' => $request->password ], $request->remember )){
    return redirect()->route('dashboard');
        }
    return redirect()->back()->withInput($request->only('username', 'remember'))->with('msg','User Email Or Password Did Not Matched');
    }

    public function dashboard()
    {
        $st = Stuff::latest()->first();
        return view('stuff.index', compact('st'));
    }

    public function logout()
    {
        Auth::guard('stuff')->logout();
        return redirect('/stuff');
    }
    public function edit($id)
    {
        $stuff = Stuff::find($id);
        return view('stuff.edit')->with(['stuff' => $stuff]);
    }

//    public function stuff_credential_rules(array $data)
//    {
//        $messages = [
//            'current-password.required' => 'Please enter current password',
//            'password.required' => 'Please enter password',
//        ];
//
//        $validator = Validator::make($data, [
//            'current-password' => 'required',
//            'password' => 'required|same:password',
//            'password_confirmation' => 'required|same:password',
//        ], $messages);
//
//        return $validator;
//    }
//
//    public function update(Request $request)
//    {
//        if(Auth::Check())
//        {
//            $request_data = $request->all();
//            $validator = $this->stuff_credential_rules($request_data);
//            if($validator->fails())
//            {
//                return view('stuff.index')->with('massage');
//            }
//            else
//            {
//                $current_password = $request->password;
//                if(Hash::check($request_data['current-password'], $current_password))
//                {
//                    $user_id = Auth::guard('stuff')->id;
//                    $obj_user = Stuff::find($user_id);
//                    $obj_user->password = Hash::make($request_data['password']);;
//                    $obj_user->save();
//                    return "ok";
//                }
//                else
//                {
//                    $error = array('current-password' => 'Please enter correct current password');
//                    return response()->json(array('error' => $error), 400);
//                }
//            }
//        }
//        else
//        {
//            return redirect()->to('/dashboard');
//        }
//    }
//
    public function passwordchange($id)
    {
        $stuff = Auth::find($id);
        if (Hash::check(Input::get('current-password'), $stuff['password']) && Input::get('password') == Input::get('password_confirmation'))
        {
            $stuff->password = bcrypt(Input::get('password_confirmation'));
            $stuff->save();
            return redirect('dashboard')->with('massage', 'Password Changed');
        }
        else {
            return back()->with('massage', 'Password not matched');
        }

    }

}
