<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function printr($data){

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    protected function hasPermission(){
        if(auth()->user()->user_group->name == 'admin_l1'){
            return true;
        }

        return false;
    }
    
}
