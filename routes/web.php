<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/products', function () {
//     $product = array(
//         "product" => array( 
//             "title"        => 'Product 1',
//             "body_html"    => 'lorem epsum dolor.',
//             "vendor"       => "John Doe",
//             "published"    => true ,
//             "variants"     => array(
//                 array(
//                     "sku"     => 'sku of product',
//                     "price"   => '$12.32',
//                     "taxable" => false,
//                     "inventory_quantity"=> '12',
//                 )
//             )
//         )
//     );
//     $shop = Auth::user();

//     $products = $shop->api()->rest('POST', '/admin/api/2024-01/products.json', $product);

//     $products = $shop->api()->rest('GET', '/admin/api/2024-01/products.json')['body'];

//     return view('products', [
//         'products' => $products->products
//     ]);
// })->middleware(['verify.shopify'])->name('products');

Route::get('/', function () {
    $products = auth()->user()->api()->rest('GET', '/admin/api/2024-01/products.json', ['limit' => 2])['body'];

    return view('welcome', [
        'products' => $products->products
    ]);
})->middleware(['verify.shopify'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/test', function () {
    dd(User::firstOrFail());
});
