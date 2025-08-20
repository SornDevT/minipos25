<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function add(Request $request)
    {
         try{

            Category::create([
                'CategoryName' => $request->CategoryName,
            ]);

            $success = true;
            $message = 'ບັນທຶກຂໍ້ມູນສຳເລັດ';

        } 
        catch (\Illuminate\Database\QueryException $ex){

            $success = false;
            $message = $ex->getMessage();

        }

         return response()->json([
            'success' => $success,
            'message' => $message,
        ], 201);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request,$id){

         try{

            $category = Category::find($id);
            $category->CategoryName = $request->CategoryName;
            $category->save();

            $success = true;
            $message = 'ອັບເດດຂໍ້ມູນ ສຳເລັດ';

        } 
        catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

         return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

    }

    public function delete($id){

         try{

            $category = Category::find($id);
            $category->delete();

            $success = true;
            $message = 'ລຶບຂໍ້ມູນ ສຳເລັດ';

        } 
        catch (\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

         return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
