<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $product = product::create([
            'productName' => $request->productName,
            'productStock'=>$request->productStock
        ]);
            $this->generateQR($product);

        return redirect()->back();
    }


public function generateQR(Product $product)
{
    $url = route('product.show', $product->id);

    $qrCode = QrCode::format('svg')->size(300)->generate($url);

    $fileName = 'qr_codes/product_' . $product->id . '.svg';
    Storage::disk('public')->put($fileName, $qrCode);

    $product->update(['qr' => $fileName]);

    return "QR Generated!";
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
