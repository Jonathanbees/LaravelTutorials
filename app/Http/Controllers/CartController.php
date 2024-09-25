<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = []; //this simulates the database
        $products[121] = ['name' => 'Tv samsung', 'price' => '1000']; #bd
        $products[11] = ['name' => 'Iphone', 'price' => '2000']; #bd

        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session, pregunta por la session
        if ($cartProductData) { //se recomienda almacenar en sessión solo los id de los productos
            foreach ($products as $key => $product) {
                if (in_array($key, array_keys($cartProductData))) {
                    $cartProducts[$key] = $product;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id; //normalmente acá se guarda la cantidad por ejemplo $cartProductData[$id] = ['id' => $id, 'quantity' => 1];
        $request->session()->put('cart_product_data', $cartProductData);//put para guardar en la session
        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data'); //forget para borrar la session

        return back();
    }
}
