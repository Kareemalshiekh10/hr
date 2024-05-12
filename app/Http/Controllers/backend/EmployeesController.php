<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepartmentsModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EmployeesController extends Controller
{	public function index(Request $request){
    $data['getRecord'] = User::getRecord();
    return view('backend.employees.list', $data);
}
public function add(Request $request){
/*     $data['getPosition'] = PositionModel::get(); */
    $data['getDepartments'] = DepartmentsModel::get();
/*     $data['getManager'] = ManagerModel::get();
    $data['getJobs'] = JobsModel::get(); */
    return view('backend.employees.add',$data);
}
    
    public function add_post(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users',
            'Department'      => 'required',
            'Position'        => 'required',
            'Joining_Date'    => 'required',
            'Salary'          => 'required',
        ]);
    
        $user = new User;
        $user->name = trim($validatedData['name']);
        $user->email = trim($validatedData['email']);
        $user->Phone = trim($request->Phone);
        $user->Position = trim($validatedData['Position']);
        $user->Department = trim($validatedData['Department']);
        $user->Joining_Date = trim($validatedData['Joining_Date']);
        $user->Salary = trim($validatedData['Salary']);
        $user->is_role = 0; // role for employees

        if(!empty($request->file('profile_image'))){
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr.'.' .$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user-> profile_image= $filename;
        }

        $user->save();
    
        return redirect('admin/Employees')->with('success', 'Employee Added Successfully!');
    }
    
    
    public function view($id){
		$data['getRecord'] = User::find($id);
		return view('backend.employees.view', $data);
	}

	public function edit($id){
	/* 	$data['getPosition'] = PositionModel::get(); */
		$data['getDepartments'] = DepartmentsModel::get();
	/* 	$data['getManager'] = ManagerModel::get(); */

		$data['getRecord'] = User::find($id);
		/* $data['getJobs'] = JobsModel::get(); */
		return view('backend.employees.edit', $data);
	}
    public function edit_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Position = $request->Position;
        $user->Department = $request->Department;
        $user->Joining_Date = $request->Joining_Date;
        $user->Salary = $request->Salary;

        if(!empty($request->file('profile_image'))){

            if(!empty($user->profile_image) && File::exists('upload/'.$user->profile_image)){
               unlink('upload/'.$user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr.'.' .$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user-> profile_image= $filename;
        }

        $user->save();

        return redirect('admin/Employees')->with('success', 'Employee Updated Successfully!');
    }

	public function delete($id){
		$recordDelete = User::find($id);
		$recordDelete->delete();
		return redirect()->back()->with('error', 'Record successfully deleted');
	}
}


?>