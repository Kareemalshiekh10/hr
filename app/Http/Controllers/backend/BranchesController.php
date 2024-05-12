<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\BranchesModel;



class BranchesController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = BranchesModel::getRecord($request);
		return view('backend.Branches.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add AnnualHolidays for employees only not hr
		return view('backend.Branches.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'name' => 'required',
			'address' => 'required',

		]);

		$user                  = new BranchesModel;
		$user->name       = trim($request->name);
		$user->address      = trim($request->address);
		$user->save();
		
		return redirect('admin/Branches')->with('success', 'Annual Holiday successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = BranchesModel::find($id);
		return view('backend.Branches.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = BranchesModel::find($id);
		$user->name = trim($request->name);
		$user->address = trim($request->address);
	
		$user->save();

		return redirect('admin/Branches')->with('success', 'Branch successfully update');

	}

	public function delete($id){
		$user = BranchesModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}