<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BranchesModel extends Model
{
	use HasFactory;

	protected $table = 'branches';


	 static public function getRecord($request){
        // $return = self::select('jobs.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(20);

        //           return $return;

        $return = self::select('branches.*');

            //search box start
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('id', '=', Request::get('id'));
                }    

                if(!empty(Request::get('name')))
                {
                     $return = $return->where('name', 'like', '%' .Request::get('name'). '%');
                }
               

            //search box end

            $return = $return->orderBy('id', 'desc')
                      ->paginate(20);
         return $return;
    }
}