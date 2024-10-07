<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestValidation;
use App\Models\testValidation;
use Illuminate\Http\Request;

class TestValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testValidationLogin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(requestValidation $request)
    {
        // $request->validate([ 
        //     'email'=>'required|unique:test_validations|max:5',
        //     'password'=>'required|unique:test_validations|max:5',
        // ]);
        testValidation::create([
            'email' => $request->email,
            'password'=>$request->password
        ]);
        return response('the Data is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(testValidation $testValidation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testValidation $testValidation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, testValidation $testValidation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testValidation $testValidation)
    {
        //
    }
}
