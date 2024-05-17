<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeductionsModel;

class DeductionsController extends Controller
{
    public function index(Request $request) {
        $data['getRecord'] = DeductionsModel::getRecord($request);
        return view('backend.Deductions.list', $data);
    }

    public function add() {
        $data['getEmployees'] = User::where('is_role', 0)->get(); // add Deductions for employees only not HR
        return view('backend.Deductions.add', $data);
    }

    public function add_post(Request $request) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'amount' => 'required',
            'reason' => 'required',
            'salary_after_deducation' => 'required',
        ]);

        $deduction = new DeductionsModel;
        $deduction->employee_id = trim($validatedData['employee_id']);
        $deduction->amount = trim($validatedData['amount']);
        $deduction->reason = trim($validatedData['reason']);
        $deduction->salary_after_deducation = trim($validatedData['salary_after_deducation']);

        $deduction->save();

        return redirect('admin/Deductions')->with('success', 'Deduction successfully registered.');
    }

    public function edit($id) {
        $data['getEmployees'] = User::where('is_role', 0)->get();
        $data['getRecord'] = DeductionsModel::find($id);
        return view('backend.Deductions.edit', $data);
    }

    public function edit_update($id, Request $request) {
        $deduction = DeductionsModel::find($id);
        $deduction->employee_id = trim($request->employee_id);
        $deduction->amount = trim($request->amount);
        $deduction->reason = trim($request->reason);
        $deduction->salary_after_deducation = trim($request->salary_after_deducation);
        $deduction->save();

        return redirect('admin/Deductions')->with('success', 'Deduction successfully updated.');
    }

    public function delete($id) {
        $deduction = DeductionsModel::find($id);
        $deduction->delete();
        return redirect()->back()->with('error', 'Record successfully deleted.');
    }
}
