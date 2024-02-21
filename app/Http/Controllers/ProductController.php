<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = auth()->user()->api()->rest('GET', '/admin/api/2024-01/products.json')['body'];

        return view('products.index', [
            'products' => $products->products,
            'titleBar' => 'Products'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'titleBar' => 'Products/Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();

        $product = array(
            "product" => array(
                "title"        => $formFields['title'],
                "body_html"    => $formFields['body_html'],
                "vendor"       => "John Doe",
                "published"    => true,
                "variants"     => array(
                    array(
                        "sku"     => 'ZGRET',
                        "price"   => $formFields['price'],
                        "taxable" => false,
                        "inventory_quantity" => $formFields['quantity'],
                    )
                )
            )
        );

        $shop = Auth::user();
        $shop->api()->rest('POST', '/admin/api/2024-01/products.json', $product);

        return redirect('/products')->with('message', 'New product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Auth::user();
        $shop->api()->rest('DELETE', "/admin/api/2024-01/products/$id.json");

        return back()->with('message', 'Product deleted successfully!');
    }
}
