<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\EmployeesController;
use App\Http\Controllers\backend\DepartmentsController;
use App\Http\Controllers\backend\LoansController;
use App\Http\Controllers\backend\IncentivesController;
use App\Http\Controllers\backend\DeductionsController;
use App\Http\Controllers\backend\AnnualHolidaysController;
use App\Http\Controllers\backend\OfficialHolidaysController;
use App\Http\Controllers\backend\AnnualIncreasesController;
use App\Http\Controllers\backend\BranchesController;
use App\Http\Controllers\backend\MyAccountController;
use App\Http\Controllers\backend\ScoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [AuthController::class, 'index']);
Route::get('forget_password', [AuthController::class, 'forget_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'checkemail']);

Route::post('login_post', [AuthController::class, 'login_post']);
//admin || HR same name 
Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/Dashboard', [DashboardController::class, 'Dashboard']);  //dashboard
   
    Route::get('admin/Employees', [EmployeesController::class, 'index']); //list of employees
    Route::get('admin/employees/add', [EmployeesController::class, 'add']); //add employee
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']); //add employee
    Route::get('admin/Employees/view/{id}', [EmployeesController::class, 'view']);  //view employee
    Route::get('admin/Employees/edit/{id}', [EmployeesController::class, 'edit']);  //edit employee
    Route::post('admin/Employees/edit/{id}', [EmployeesController::class, 'edit_update']);  //edit employee
    Route::get('admin/Employees/delete/{id}', [EmployeesController::class, 'delete']);  //delete employee



//Departments
    Route::get('admin/Departments', [DepartmentsController::class, 'index']);  //Departments
    Route::get('admin/Departments/add', [DepartmentsController::class, 'add']);  //add department
    Route::post('admin/Departments/add', [DepartmentsController::class, 'add_post']);  //add department
    Route::get('admin/Departments/view/{Dep_id}', [DepartmentsController::class, 'view']);  //view department
    Route::get('admin/Departments/edit/{Dep_id}', [DepartmentsController::class, 'edit']);  //edit department
    Route::get('admin/Departments/delete/{Dep_id}', [DepartmentsController::class, 'delete']);  //delete department
    Route::post('admin/Departments/edit/{Dep_id}', [DepartmentsController::class, 'edit_update']);  //edit department

//Loans
    Route::get('admin/Loans', [LoansController::class, 'index']);  //Loans
    Route::get('admin/Loans/add', [LoansController::class, 'add']);  //add loan
    Route::post('admin/Loans/add', [LoansController::class, 'add_post']);  //add loan
    Route::get('admin/Loans/view/{id}', [LoansController::class, 'view']);  //view loan
    Route::get('admin/Loans/edit/{id}', [LoansController::class, 'edit']);  //edit loan
    Route::post('admin/Loans/edit/{id}', [LoansController::class, 'edit_update']);  //edit loan
    Route::get('admin/Loans/delete/{id}', [LoansController::class, 'delete']);  //delete loan

//Incentives
    Route::get('admin/Incentives', [IncentivesController::class, 'index']);  //Incentives
    Route::get('admin/Incentives/add', [IncentivesController::class, 'add']);  //add Incentive
    Route::post('admin/Incentives/add', [IncentivesController::class, 'add_post']);  //add Incentive
    Route::get('admin/Incentives/view/{id}', [IncentivesController::class, 'view']);  //view Incentive
    Route::get('admin/Incentives/edit/{id}', [IncentivesController::class, 'edit']);  //edit Incentive
    Route::post('admin/Incentives/edit/{id}', [IncentivesController::class, 'edit_update']);  //edit Incentive
    Route::get('admin/Incentives/delete/{id}', [IncentivesController::class, 'delete']);  //delete Incentive

//Deductions
    Route::get('admin/Deductions', [DeductionsController::class, 'index']);  //Deductions
    Route::get('admin/Deductions/add', [DeductionsController::class, 'add']);  //add Deduction
    Route::post('admin/Deductions/add', [DeductionsController::class, 'add_post']);  //add Deduction
    Route::get('admin/Deductions/view/{id}', [DeductionsController::class, 'view']);  //view Deduction
    Route::get('admin/Deductions/edit/{id}', [DeductionsController::class, 'edit']);  //edit Deduction
    Route::post('admin/Deductions/edit/{id}', [DeductionsController::class, 'edit_update']);  //edit Deduction
    Route::get('admin/Deductions/delete/{id}', [DeductionsController::class, 'delete']);  //delete Deduction


//Annual Holidays
    Route::get('admin/AnnualHolidays', [AnnualHolidaysController::class, 'index']);  //Annual Holidays
    Route::get('admin/AnnualHolidays/add', [AnnualHolidaysController::class, 'add']);  //add Annual Holiday
    Route::post('admin/AnnualHolidays/add', [AnnualHolidaysController::class, 'add_post']);  //add Annual Holiday
    Route::get('admin/AnnualHolidays/view/{id}', [AnnualHolidaysController::class, 'view']);  //view Annual Holiday
    Route::get('admin/AnnualHolidays/edit/{id}', [AnnualHolidaysController::class, 'edit']);  //edit Annual Holiday
    Route::post('admin/AnnualHolidays/edit/{id}', [AnnualHolidaysController::class, 'edit_update']);  //edit Annual Holiday
    Route::get('admin/AnnualHolidays/delete/{id}', [AnnualHolidaysController::class, 'delete']);  //delete Annual Holiday

//Official Holidays
    Route::get('admin/OfficialHolidays', [OfficialHolidaysController::class, 'index']);  //Official Holidays
    Route::get('admin/OfficialHolidays/add', [OfficialHolidaysController::class, 'add']);  //add Official Holiday
    Route::post('admin/OfficialHolidays/add', [OfficialHolidaysController::class, 'add_post']);  //add Official Holiday
    Route::get('admin/OfficialHolidays/view/{id}', [OfficialHolidaysController::class, 'view']);  //view Official Holiday
    Route::get('admin/OfficialHolidays/edit/{id}', [OfficialHolidaysController::class, 'edit']);  //edit Official Holiday
    Route::post('admin/OfficialHolidays/edit/{id}', [OfficialHolidaysController::class, 'edit_update']);  //edit Official Holiday
    Route::get('admin/OfficialHolidays/delete/{id}', [OfficialHolidaysController::class, 'delete']);  //delete Official Holiday

//AnnualIncreases
    Route::get('admin/AnnualIncreases', [AnnualIncreasesController::class, 'index']);  //Annual Increases
    Route::get('admin/AnnualIncreases/add', [AnnualIncreasesController::class, 'add']);  //add Annual Increase
    Route::post('admin/AnnualIncreases/add', [AnnualIncreasesController::class, 'add_post']);  //add Annual Increase
    Route::get('admin/AnnualIncreases/view/{id}', [AnnualIncreasesController::class, 'view']);  //view Annual Increase
    Route::get('admin/AnnualIncreases/edit/{id}', [AnnualIncreasesController::class, 'edit']);  //edit Annual Increase
    Route::post('admin/AnnualIncreases/edit/{id}', [AnnualIncreasesController::class, 'edit_update']);  //edit Annual Increase
    Route::get('admin/AnnualIncreases/delete/{id}', [AnnualIncreasesController::class, 'delete']);  //delete Annual Increase

//Branches
    Route::get('admin/Branches', [BranchesController::class, 'index']);  //Branches
    Route::get('admin/Branches/add', [BranchesController::class, 'add']);  //add Branch
    Route::post('admin/Branches/add', [BranchesController::class, 'add_post']);  //add Branch
    Route::get('admin/Branches/view/{id}', [BranchesController::class, 'view']);  //view Branch
    Route::get('admin/Branches/edit/{id}', [BranchesController::class, 'edit']);  //edit Branch
    Route::post('admin/Branches/edit/{id}', [BranchesController::class, 'edit_update']);  //edit Branch
    Route::get('admin/Branches/delete/{id}', [BranchesController::class, 'delete']);  //delete Branch

// Scores
    Route::get('admin/Scores', [ScoresController::class, 'index']);  // Scores
    Route::get('admin/Scores/add', [ScoresController::class, 'add']);  // add Score
    Route::post('admin/Scores/add', [ScoresController::class, 'add_post']);  // add Score
    Route::get('admin/Scores/view/{employee_id}', [ScoresController::class, 'view']);  // view Score
    Route::get('admin/Scores/edit/{employee_id}', [ScoresController::class, 'edit']);
    Route::post('admin/Scores/edit/{employee_id}', [ScoresController::class, 'edit_update']);    
    Route::get('admin/Scores/delete/{employee_id}', [ScoresController::class, 'delete']);  // delete Score


//My Account
    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);  //My Account
    Route::post('admin/my_account/update', [MyAccountController::class, 'edit_update']);  //My Account
    Route::get('admin/myaccount/changepassword', [AuthController::class, 'changepassword']);  //Change Password
    Route::post('admin/myaccount/changepassword', [AuthController::class, 'changepassword_update']);  //Change Password

});

//route for logout
Route::get('logout', [AuthController::class, 'logout']);
