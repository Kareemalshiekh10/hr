<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\AnnualHolidaysModel;



class AnnualHolidaysController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = AnnualHolidaysModel::getRecord($request);
		return view('backend.AnnualHolidays.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add AnnualHolidays for employees only not hr
		return view('backend.AnnualHolidays.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'holiday_date' => 'required',
			'description' => 'required',

		]);

		$user                  = new AnnualHolidaysModel;
		$user->employee_id       = trim($request->employee_id);
		$user->holiday_date      = trim($request->holiday_date);
		$user->description      = trim($request->description);
		$user->save();
		
		return redirect('admin/AnnualHolidays')->with('success', 'Annual Holiday successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = AnnualHolidaysModel::find($id);
		return view('backend.AnnualHolidays.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = AnnualHolidaysModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->holiday_date = trim($request->holiday_date);
		$user->description = trim($request->description);
	
		$user->save();

		return redirect('admin/AnnualHolidays')->with('success', 'Annual Holiday successfully update');

	}

	public function delete($id){
		$user = AnnualHolidaysModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}