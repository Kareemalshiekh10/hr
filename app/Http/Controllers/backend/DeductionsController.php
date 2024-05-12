<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\DeductionsModel;



class DeductionsController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = DeductionsModel::getRecord($request);
		return view('backend.Deductions.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add Deductions for employees only not hr
		return view('backend.Deductions.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'amount' => 'required',
			'reason' => 'required',
            'salary_after_deducation' => 'required',

		]);

		$user                  = new DeductionsModel;
		$user->employee_id       = trim($request->employee_id);
		$user->amount      = trim($request->amount);
		$user->reason      = trim($request->reason);
		$user->salary_after_deducation      = trim($request->salary_after_deducation);

		$user->save();
		
		return redirect('admin/Deductions')->with('success', 'Deduction successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = DeductionsModel::find($id);
		return view('backend.Deductions.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = DeductionsModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->amount = trim($request->amount);
		$user->reason = trim($request->reason);
		$user->salary_after_deducation = trim($request->salary_after_deducation);
		$user->save();

		return redirect('admin/Deductions')->with('success', 'Deduction successfully update');

	}

	public function delete($id){
		$user = DeductionsModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}