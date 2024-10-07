<?php

namespace App\Http\Controllers;
use App\Jobs\test;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(){
       return view('welcome');
    }

    public function createUser(Request $request){
       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('showUsers');
    } 

    
    public function showUsers(){
        $users = User::get();
        return view('showUsers',compact('users'));
    }

    public function updateUserBlade($id){
      $user = User::find($id);
       return view('updateUserBlade',compact('user'));
    }

    public function updateUser(Request $request , $id){
        User::where('id',$id)->first()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);          
        return redirect()->route('showUsers');
    }
    public function many(){
        $user = User::find(2);
        $user->roles()->syncWithoutDetaching(4);
        return "success";
    }


    // public $test = "s";
    // public function sendvalue(){
    //     $test = "value";
    //     return $this->testFunction($test);
    //     // return "ok";
    // }
    // public function testFunction($test){
    //    return $test;
    // }
 public function test(){
    test::dispatch()->delay(now()->second(10));
    return 'ok';
 }
 public function testPivot(){
   $user = User::create([
        'name'=>'islam',
        'email'=>'is606ay@gmail.com',
        'password'=>'test'
    ]);
  $role =  Role::create([
        'role_name'=>'admin',
        'user_id'=>$user->id
    ]);
    $user->roles()->syncWithoutDetaching($role->id);
    return 'ok';
 }
   public function getPivot(){
    //  return User::where('id',6)->first()->roles[0]->pivot;
    $user =  User::with('roles')->find(6);
    return $user;
   }

}