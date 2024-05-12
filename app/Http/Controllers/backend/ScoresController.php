<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ScoresModel;
use Illuminate\Support\Facades\Http;


class ScoresController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = ScoresModel::getRecord($request);
        return view('backend.Scores.list', $data);
    }

    public function add()
    {
        $data['getEmployees'] = User::where('is_role','=',0)->get();  // add Scores for employees only not hr
        return view('backend.Scores.add', $data);
    }

    public function add_post(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'work_life_balance' => 'required',
            'skill_development' => 'required',
            'salary_and_benefits' => 'required',
            'job_security' => 'required',
            'career_growth' => 'required',
            'work_satisfaction' => 'required',
          /*   'Overall_rating' => 'required', */
        ]);

        // dd($validatedData);
        $data = [
            'work_life_balance' => $request->work_life_balance,
            'skill_development' => $request->skill_development,
            'salary_and_benefits' => $request->salary_and_benefits,
            'job_security' => $request->job_security,
            'career_growth' => $request->career_growth,
            'work_satisfaction' => $request->work_satisfaction,
        ];

       
        
        // $jsonData = json_encode($data);
        // // Send a POST request to the Flask API

        // dd($jsonData);
        $response = Http::asJson()->post('http://localhost:9000', $data);

    
        // Check if the request was successful
        if ($response->successful()) {
            // Get the predicted overall rating from the response
            $overall_rating = $response->json()['Overall_rating'];
    
            // Save the overall rating to your database or perform any other actions
            // Example: $score->overall_rating = $overall_rating;
        } else {
            // Handle the case where the request failed
            return redirect()->back()->with('error', 'Failed to get overall rating from Flask API');
        }



        $score = new ScoresModel;
        $score->employee_id = $request->employee_id;
        $score->work_life_balance = $request->work_life_balance;
        $score->skill_development = $request->skill_development;
        $score->salary_and_benefits = $request->salary_and_benefits;
        $score->job_security = $request->job_security;
        $score->career_growth = $request->career_growth;
        $score->work_satisfaction = $request->work_satisfaction;
        $score->Overall_rating = $overall_rating;

        $score->save();

        return redirect('admin/Scores')->with('success', 'Score successfully registered.');  
    }

    public function edit($employee_id)
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getRecord'] = ScoresModel::where('employee_id', $employee_id)->first();
        return view('backend.Scores.edit', $data);
    }
    
    

/*     public function edit_update($employee_id, Request $request){
		$user = ScoresModel::find($employee_id);
		$user->work_life_balance = trim($request->work_life_balance);
		$user->skill_development = trim($request->skill_development);
		$user->salary_and_benefits = trim($request->salary_and_benefits);
        $user->job_security = trim($request->job_security);
		$user->career_growth = trim($request->career_growth);
        $user->work_satisfaction = trim($request->work_satisfaction);
		$user->overall_rating = trim($request->overall_rating);
	
		$user->save();

		return redirect('admin/Scores')->with('success', 'Score successfully update');

	} */

    public function edit_update($employee_id, Request $request)
{
    $validatedData = $request->validate([
        'work_life_balance' => 'required',
        'skill_development' => 'required',
        'salary_and_benefits' => 'required',
        'job_security' => 'required',
        'career_growth' => 'required',
        'work_satisfaction' => 'required',
        'Overall_rating' => 'required',
    ]);
 
    // Find the record using its ID
    $score = ScoresModel::findOrFail($employee_id);
    // Update the record with the new values
    $score->work_life_balance = $request->work_life_balance;
    $score->skill_development = $request->skill_development;
    $score->salary_and_benefits = $request->salary_and_benefits;
    $score->job_security = $request->job_security;
    $score->career_growth = $request->career_growth;
    $score->work_satisfaction = $request->work_satisfaction;
    $score->Overall_rating = $request->Overall_rating;

    // Save the updated record
    $score->save();

    return redirect('admin/Scores')->with('success', 'Score successfully updated');
}


    public function delete($employee_id)
    {
        $score = ScoresModel::find($employee_id);
        if ($score) {
            $score->delete();
            return redirect()->back()->with('success', 'Record successfully deleted');
        } else {
            return redirect()->back()->with('error', 'Record not found');
        }
    }
}
