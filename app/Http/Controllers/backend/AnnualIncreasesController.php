<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\AnnualIncreasesModel;



class AnnualIncreasesController extends Controller
{
	public function index(Request $request){
		$data['getRecord'] = AnnualIncreasesModel::getRecord($request);
		return view('backend.AnnualIncreases.list', $data);
	}
	public function add(){
		$data['getEmployees'] = User::where('is_role','=',0)->get();  // add AnnualIncreases for employees only not hr
		return view('backend.AnnualIncreases.add', $data);
	}

	public function add_post(Request $request){
		/* dd($request->all()); */

		$user = request()->validate([
			'employee_id' => 'required',
			'percentage_inc' => 'required',
			'effective_date' => 'required',
            'description' => 'required',

		]);

		$user                  = new AnnualIncreasesModel;
		$user->employee_id       = trim($request->employee_id);
		$user->percentage_inc      = trim($request->percentage_inc);
        $user->effective_date      = trim($request->effective_date);
		$user->description      = trim($request->description);
		$user->save();
		
		return redirect('admin/AnnualIncreases')->with('success', 'Annual Holiday successfully register.');	
	}
	public function edit($id){
		$data['getEmployees'] = User::where('is_role', '=', 0)->get();
		$data['getRecord'] = AnnualIncreasesModel::find($id);
		return view('backend.AnnualIncreases.edit', $data);
	}

	public function edit_update($id, Request $request){
		$user = AnnualIncreasesModel::find($id);
		$user->employee_id = trim($request->employee_id);
		$user->percentage_inc = trim($request->percentage_inc);
        $user->effective_date = trim($request->effective_date);
		$user->description = trim($request->description);
	
		$user->save();

		return redirect('admin/AnnualIncreases')->with('success', 'Annual Increase successfully update');

	}

	public function delete($id){
		$user = AnnualIncreasesModel::find($id);
		$user->delete();
		return redirect()->back()->with('error', 'Record successfully delete');
	}
}