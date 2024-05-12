<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\OfficialHolidaysModel;



class OfficialHolidaysController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = OfficialHolidaysModel::getRecord($request);
		return view('backend.OfficialHolidays.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add OfficialHolidays for employees only not hr
		return view('backend.OfficialHolidays.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'holiday_date' => 'required',
			'description' => 'required',

		]);

		$user                  = new OfficialHolidaysModel;
		$user->employee_id       = trim($request->employee_id);
		$user->holiday_date      = trim($request->holiday_date);
		$user->description      = trim($request->description);
		$user->save();
		
		return redirect('admin/OfficialHolidays')->with('success', 'Official Holiday successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = OfficialHolidaysModel::find($id);
		return view('backend.OfficialHolidays.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = OfficialHolidaysModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->holiday_date = trim($request->holiday_date);
		$user->description = trim($request->description);
	
		$user->save();

		return redirect('admin/OfficialHolidays')->with('success', 'Official Holiday successfully update');

	}

	public function delete($id){
		$user = OfficialHolidaysModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}