<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transection;

class ProductController extends Controller
{
    // ດຶງຂໍ້ມູນ Product ທັງໝົດ
    public function index()
    {

        $category_id = \Request::get('category_id');
        $per_page = \Request::get('per_page');
        $sort = \Request::get('sort');
        $search = \Request::get('search');

        $products = Product::join('categories', 'products.CategoryID', '=', 'categories.id')
            ->select('products.*', 'categories.CategoryName');

            // filter category
        if ($category_id && $category_id != 'all') {
            $products = $products->where('products.CategoryID', $category_id);
        }

        // filter search
        if ($search) {
            $products = $products->where(function ($query) use ($search) {
                $query->where('products.ProductName', 'like', "%$search%")
                      ->orWhere('categories.CategoryName', 'like', "%$search%")
                      ->orWhere('products.PriceBuy', 'like', "%$search%")
                      ->orWhere('products.PriceSell', 'like', "%$search%");
            });
        }
        // check per_page
        if($per_page == 'all'){
            $products = $products
            ->orderBy('products.id', $sort)
            ->get();
        } else {
            $products = $products
            ->orderBy('products.id', $sort)
            ->paginate($per_page);
        }
        

        return response()->json($products);
    }

    // ເພີ່ມ Product ໃໝ່
    public function add(Request $request)
    {
        try {


            // set path
            $ImagePath = 'assets/img/';

            // ກວດເບີ່ງວ່າມີໄຟລ໌ ສົ່ງມາຫຼືບໍ່
            if ($request->hasFile('ImagePath')) {
                $file = $request->file('ImagePath');
                $new_image = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($ImagePath), $new_image);
            } else {
                $new_image = null;
            }

          $product = Product::create([
                'ProductName' => $request->ProductName,
                'CategoryID'  => $request->CategoryID,
                'ImagePath'   => $new_image,
                'Qty'         => $request->Qty,
                'PriceBuy'    => $request->PriceBuy,
                'PriceSell'   => $request->PriceSell,
            ]);

            // add transection 
             $tran_id = 'TR'.date('Ymd').rand(100,999);
                    $transection = new Transection();
                    $transection->TranID = $tran_id;
                    $transection->TranType = 'expense';
                    $transection->ProductID = $product->id;
                    $transection->Qty = $request->Qty;
                    $transection->Price = $request->PriceBuy*$request->Qty;
                    $transection->Detail = 'ນຳເຂົ້າສິນຄ້າ: '. $request->ProductName;
                    $transection->save();

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

            $ImagePath = 'assets/img/';

            if ($request->hasFile('ImagePath')) {

                // remove old image
                if ($product->ImagePath && file_exists(public_path($ImagePath . $product->ImagePath))) {
                    unlink(public_path($ImagePath . $product->ImagePath));
                }

                $file = $request->file('ImagePath');
                $new_image = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($ImagePath), $new_image);

                $product->ImagePath = $new_image;   
            } else{

                if($request->ImagePath == null) {
                    // remove old image
                    if ($product->ImagePath && file_exists(public_path($ImagePath . $product->ImagePath))) {
                        unlink(public_path($ImagePath . $product->ImagePath));
                    }
                    $product->ImagePath = null;  
                }

            }


            $product->ProductName = $request->ProductName;
            $product->CategoryID  = $request->CategoryID;
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
            $ImagePath = 'assets/img/';
            $product = Product::find($id);

            if ($product->ImagePath && file_exists(public_path($ImagePath . $product->ImagePath))) {
                unlink(public_path($ImagePath . $product->ImagePath));
            }

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
