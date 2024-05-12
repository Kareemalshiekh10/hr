<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\AnnualHolidaysModel;
use App\Models\AnnualIncreasesModel;
use App\Models\BranchesModel;
use App\Models\DeductionsModel;
use App\Models\DepartmentsModel;
use App\Models\IncentivesModel;
use App\Models\LoansModel;
use App\Models\OfficialHolidaysModel;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function Dashboard(Request $request)
    {
        $data['getEmployeesCount'] = User::count();
        $data['getHRCount'] = User::where('is_role', '=', 1)->count();
        $data['getEMPCount'] = User::where('is_role', '=', 0)->count();

        $data['getDepartments'] = DepartmentsModel::count();

        $data['getLoans'] = LoansModel::count();

		$data['getIncentives'] = IncentivesModel::count();

		$data['getDeductions'] = DeductionsModel::count();

		$data['getAnnualHolidays'] = AnnualHolidaysModel::count();

		$data['getOfficialHolidays'] = OfficialHolidaysModel::count();

		$data['getAnnualIncreases'] = AnnualIncreasesModel::count();

		$data['getBranches'] = BranchesModel::count();

        

        return view('backend.Dashboard.list',$data);
    }
}


?>