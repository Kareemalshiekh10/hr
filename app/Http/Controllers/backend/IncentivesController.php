<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepartmentsModel;
use App\Models\IncentivesModel;



class IncentivesController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = IncentivesModel::getRecord($request);
		return view('backend.Incentives.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add loan for employees only not hr
		return view('backend.Incentives.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'amount' => 'required',
			'description' => 'required',

		]);

		$user                  = new IncentivesModel;
		$user->employee_id       = trim($request->employee_id);
		$user->amount      = trim($request->amount);
		$user->description      = trim($request->description);
		
		$user->save();
		
		return redirect('admin/Incentives')->with('success', 'Incentive successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = IncentivesModel::find($id);
		return view('backend.Incentives.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = IncentivesModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->amount = trim($request->amount);
		$user->description = trim($request->description);
	
		$user->save();

		return redirect('admin/Incentives')->with('success', 'Incentive successfully update');

	}

	public function delete($id){
		$user = IncentivesModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}