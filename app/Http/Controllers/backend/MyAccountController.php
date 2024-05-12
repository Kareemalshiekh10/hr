<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
       return view('backend.MyAccount.update',$data);
    }
    
    public function edit_update(Request $request)
    {
        $use = $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
            $user->name =    trim($request->name);
            $user->email =     trim($request->email);

            if(!empty($request->password)){
            $user->password =    trim($request->password);
            }

            if(!empty($request->file('profile_image'))){
                if(!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)){
                    unlink('upload/'.$user->profile_image);
                }
                $file = $request->file('profile_image');
                $randomStr = Str::random(30);
                $filename  = $randomStr .'.'.$file->getClientOriginalExtension();
                $file->move('upload/',$filename);
                $user->profile_image = $filename;
            }


            $user->save();

            return redirect('admin/my_account')->with('success', 'Update Successfully');
    }


}


?>