<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class LoansModel extends Model
{
	use HasFactory;

	protected $table = 'Loans';


	 static public function getRecord($request){
        // $return = self::select('jobs.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(20);

        //           return $return;

        $return = self::select('Loans.*','users.name')
                        ->join('users', 'Loans.employee_id', '=', 'users.id')
                       /*  ->join('departments', 'Loans.department_id', '=', 'departments.id') */
                       /*  ->select('Loans.*','users.name as user_name','departments.name as department_name') */
                        ->orderBy('Loans.id', 'desc');

            //search box start
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('Loans.id', '=', Request::get('id'));
                }    

                if(!empty(Request::get('name')))
                {
                     $return = $return->where('users.name', 'like', '%' .Request::get('name'). '%');
                }
                if(!empty(Request::get('status')))
                {
                    $return = $return->where('Loans.status', '=', Request::get('status'));
                }


               

            //search box end

            $return = $return->orderBy('id', 'desc')
                      ->paginate(20);
         return $return;
    }

    public function get_user_name_single(){
        return $this->belongsTo(User::class,"employee_id");
    }

    public function get_department_name_single(){
        return $this->belongsTo(DepartmentsModel::class,"department_id");
    }
}