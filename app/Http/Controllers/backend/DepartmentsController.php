<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepartmentsModel;


class DepartmentsController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = DepartmentsModel::getRecord($request);
		return view('backend.Departments.list', $data);
	}
    public function add(Request $request){
	/* 	$data['getManager'] = ManagerModel::get();
		$data['getLocation'] = LocationsModel::get(); */
		return view('backend.Departments.add'/* , $data */);
	}
    

	public function add_post(Request $request){
		//dd($request->all());

		$user = request()->validate([
            'name' => 'required',
            'head' => 'required',
            'Dep_description' => 'required',
            'Employees_Count' => 'required',

		]);

		$user                  = new DepartmentsModel;
		$user->name       = trim($request->name);
		$user->head      = trim($request->head);
		$user->Dep_description      = trim($request->Dep_description);
        $user->Employees_Count      = trim($request->Employees_Count);
		
		$user->save();
		
		return redirect('admin/Departments')->with('success', 'Department successfully register.');	
	}
    

 
    public function view($id, Request $request)
	{
		$data['getRecord'] = DepartmentsModel::find($id);
		return view('backend.Departments.view', $data);
	}

    public function delete($id){
		$user = DepartmentsModel::find($id);
		$user->delete();

		return redirect()->back()->with('error', 'Record successfully delete');
	}
    
	public function edit($id, Request $request){
	/* 	$data['getManager'] = ManagerModel::get(); */
		$data['getRecord'] = DepartmentsModel::find($id);
	/* 	$data['getLocation'] = LocationsModel::get(); */
		return view('backend.departments.edit', $data);
	}

    public function edit_update(Request $request, $id)
    {
        $user = DepartmentsModel::find($id);
        $user->name = $request->name;
        $user->head = $request->head;
        $user->Dep_description = $request->Dep_description;
        $user->Employees_Count = $request->Employees_Count;
        $user->save();
        return redirect('admin/Departments')->with('success', 'Department Updated Successfully!');
    }

}


?>