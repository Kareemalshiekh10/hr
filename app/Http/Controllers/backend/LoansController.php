<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepartmentsModel;
use App\Models\LoansModel;



class LoansController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = LoansModel::getRecord($request);
		return view('backend.Loans.list', $data);
	}
	public function add(){
		$data['getDepartment'] = DepartmentsModel::get();
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add loan for employees only not hr
		return view('backend.Loans.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'department_id' => 'required',
			'amount' => 'required',
			'date_requested' => 'required',
			'status' => 'required',

		]);

		$user                  = new LoansModel;
		$user->employee_id       = trim($request->employee_id);
		$user->department_id      = trim($request->department_id);
		$user->amount      = trim($request->amount);
		$user->date_requested      = trim($request->date_requested);
		$user->status      = trim($request->status);
		
		$user->save();
		
		return redirect('admin/Loans')->with('success', 'Loan successfully register.');	
	}
	public function edit($id){
		$data['getDepartment'] = DepartmentsModel::get();
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = LoansModel::find($id);
		return view('backend.Loans.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = LoansModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->department_id = trim($request->department_id);
		$user->amount = trim($request->amount);
		$user->date_requested = trim($request->date_requested);
		$user->status = trim($request->status);
	
		$user->save();

		return redirect('admin/Loans')->with('success', 'Loan successfully update');

	}

	public function delete($id){
		$user = LoansModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}