<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transection;

class TransectionController extends Controller
{
    //


       public function add(Request $request)
        {
            try {

                
                foreach($request->order_items as $item){
                   
                    // gen tran id
                    $tran_id = 'TR'.date('Ymd').rand(100,999);
                    $transection = new Transection();
                    $transection->TranID = $tran_id;
                    $transection->TranType = 'income';
                    $transection->ProductID = $item['id'];
                    $transection->Qty = $item['qty'];
                    $transection->Price = $item['price'];
                    $transection->Detail = $item['name'];
                    $transection->save();
                }

                $success = true;
                $message = 'ສຳເລັດ';

            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
            }

            return response()->json([
                'success' => $success,
                'message' => $message,
            ], 201);
        }
    
}
