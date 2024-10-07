<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UserServicesController{
    public function createUser($request){
       $rules=[
         'email'=> 'unique:users|email|required',
         'name' => 'required|string|min:3|max:10',
         'password' => 'required|min:3|max:10',
       ];
       $validate = Validator::make($request->all(),$rules);
       if($validate->fails()){
        return $validate->errors();
       }
       $user = User::create($request->all());
       return $user;
    } 
}