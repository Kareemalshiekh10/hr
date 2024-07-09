<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ScoresModel extends Model
{
	use HasFactory;

    protected $table = 'scores';
    protected $primaryKey = 'employee_id'; // Specify employee_id as the primary key
    public $incrementing = false; // Disable auto-incrementing for the primary key



	 static public function getRecord($request){
        // $return = self::select('jobs.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(20);

        //           return $return;

        $return = self::select('scores.*','users.name')
                        ->join('users', 'scores.employee_id', '=', 'users.id')

                        ->orderBy('users.id', 'desc');

            //search box start

                if(!empty(Request::get('name')))
                {
                     $return = $return->where('users.name', 'like', '%' .Request::get('name'). '%');
                }


            //search box end

            $return = $return->orderBy('users.name', 'desc')
                      ->paginate(20);
         return $return;
    }

    public function get_user_name_single(){
        return $this->belongsTo(User::class,"employee_id");
    }


}