<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signIn');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        product::create([
            'productName' => $request->productName,
            'productStock'=>$request->productStock
        ]);
        return "added";
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $getData = product::get();
        return view('showData',compact('getData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = product::findorFail($id);
        return view('editProduct',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $updateProduct = product::findorFail($id);
        $updateProduct->update([
            'productName'=>$request->productName,
            'productStock'=>$request->productStock
        ]);
        return "updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        product::destroy($id);
        $testa = product::onlyTrashed()->get();
        return view('deleted',compact('testa'));
    }
    public function deleted(){
       
    }
}
