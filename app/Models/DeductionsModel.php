<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class DeductionsModel extends Model
{
	use HasFactory;

	protected $table = 'Deductions';


	 static public function getRecord($request){
        // $return = self::select('jobs.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(20);

        //           return $return;

        $return = self::select('Deductions.*','users.name')
                        ->join('users', 'Deductions.employee_id', '=', 'users.id')

                        ->orderBy('Deductions.id', 'desc');

            //search box start
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('Deductions.id', '=', Request::get('id'));
                }    

                if(!empty(Request::get('name')))
                {
                     $return = $return->where('users.name', 'like', '%' .Request::get('name'). '%');
                }



               

            //search box end

            $return = $return->orderBy('id', 'desc')
                      ->paginate(20);
         return $return;
    }

    public function get_user_name_single(){
        return $this->belongsTo(User::class,"employee_id");
    }


}