<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // ດຶງຂໍ້ມູນ Product ທັງໝົດ
    public function index()
    {

        $category_id = \Request::get('category_id');

        $products = Product::join('categories', 'products.CategoryID', '=', 'categories.id')
            ->select('products.*', 'categories.CategoryName');

        if ($category_id && $category_id != 'all') {
            $products = $products->where('products.CategoryID', $category_id);
        }

        $products = $products->get();

        return response()->json($products);
    }

    // ເພີ່ມ Product ໃໝ່
    public function add(Request $request)
    {
        try {
            Product::create([
                'ProductName' => $request->ProductName,
                'CategoryID'  => $request->CategoryID,
                'ImagePath'   => $request->ImagePath,
                'Qty'         => $request->Qty,
                'PriceBuy'    => $request->PriceBuy,
                'PriceSell'   => $request->PriceSell,
            ]);

            $success = true;
            $message = 'ບັນທຶກຂໍ້ມູນສຳເລັດ';

        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ], 201);
    }

    // ດຶງຂໍ້ມູນສຳລັບແກ້ໄຂ
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    // ອັບເດດ Product
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->ProductName = $request->ProductName;
            $product->CategoryID  = $request->CategoryID;
            $product->ImagePath   = $request->ImagePath;
            $product->Qty         = $request->Qty;
            $product->PriceBuy    = $request->PriceBuy;
            $product->PriceSell   = $request->PriceSell;
            $product->save();

            $success = true;
            $message = 'ອັບເດດຂໍ້ມູນສຳເລັດ';

        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // ລຶບ Product
    public function delete($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            $success = true;
            $message = 'ລຶບຂໍ້ມູນສຳເລັດ';

        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
