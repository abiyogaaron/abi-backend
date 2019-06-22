<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Users extends Model
{
    protected $table = 'users';

    public static function get(){
      return DB::table('users')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public static function create($user){
      return $user->save();
    }
}
