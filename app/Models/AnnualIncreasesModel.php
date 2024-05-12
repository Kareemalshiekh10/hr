<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AnnualIncreasesModel extends Model
{
	use HasFactory;

	protected $table = 'annual_increases';


	 static public function getRecord($request){
        // $return = self::select('jobs.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(20);

        //           return $return;

        $return = self::select('annual_increases.*','users.name')
                        ->join('users', 'annual_increases.employee_id', '=', 'users.id')

                        ->orderBy('annual_increases.id', 'desc');

            //search box start
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('annual_increases.id', '=', Request::get('id'));
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