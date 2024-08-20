<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "400"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "800000"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "30"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "40"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $product = collect(ProductController::$products)->firstWhere('id', $id);

        if (!$product) {
            return redirect()->route('home.index');
        }

        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:1",
        ]);
        return redirect()->route('products.success');

    }

}

