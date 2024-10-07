<?php

namespace App\Http\Controllers;

use App\Models\testusers;
use App\Models\User;
use App\Services\UserServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use App\Services\UserServicesController;
class TestusersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(UserServicesController $user)
    {
        $this->_user = $user;
    }
    public function index()
    {
        return view('welcome');
    }
    public function dataview(){
        return view('allData');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        testusers::create([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $allData = testusers::all();
        return view('allData',compact('allData'));
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(testusers $testusers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edituser = testusers::findorFail($id);
        return view('edit',compact('edituser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $users = testusers::findorFail($id);
        $users->update($request->all());
        return view('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         testusers::destroy($id);
         return redirect()->back();
    }
    public function register(Request $request){
        $rules = [
          'name' => 'required|min:3|max:10',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:3|max:8'
        ];
        $validate = Validator::make($request->all(),$rules);
        if($validate->fails()){
         return $validate->errors();
        }
        return User::create($request->all()); 
     }
    public function login(Request $request){
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3|max:8'
          ];
          $validate = Validator::make($request->all(),$rules);
          if($validate->fails()){
           return $validate->errors();
          }
          if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
              $user = Auth::user();
              $success = $user->createToken('test')->plainTextToken;
              User::where('email',$user->email)->first()->update([
                 'remember_token' => $success
              ]);
              return 'login successfully';
          }else{
             return 'unAuthorized';
          }
    }   
    public function getUser(){
        $user = Auth::user();
        return $user;
    }
    public function logout(Request $request){
        $user = $request->user(); // Get user from request

    if ($user) {
        $user->tokens()->delete(); // Delete all user's tokens
        return response()->json(['message' => 'Successfully logged out']);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    } 
    public $_user;
  
    public function RegisterUser(UserServicesController $userServices , Request $request){
        return $userServices->createUser($request);
    }
}
