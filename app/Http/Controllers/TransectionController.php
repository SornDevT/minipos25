<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transection;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Product;

class TransectionController extends Controller
{
    //

    public function index(){

        // get query params
        $sort = \Request::get('sort', 'asc');
        $perPage = \Request::get('per_page', 10);
        $dmy = \Request::get('dmy', null);
        $monthType = \Request::get('month_type', 'm');

        $m = explode('-', $dmy)[1];
        $y = explode('-', $dmy)[0];

        // get transections
        $transections = Transection::query();


        if($monthType == 'm'){
            $transections->whereMonth('created_at', $m)->whereYear('created_at', $y);

        }else{
            $transections->whereYear('created_at', $y);
        }

        $transections = $transections->orderBy('id', $sort)->paginate($perPage);

        return response()->json($transections);
    }

       public function add(Request $request)
        {
            try {


                // gen bill id 
                $bill_id = 'B'.date('Ymd').rand(100,999);

                // add bill
                $bill = new Bill();
                $bill->BillID = $bill_id;
                $bill->CustomerName = $request->customer_name;
                $bill->PhoneNumber = $request->customer_tel;
                $bill->save();

                foreach($request->order_items as $item){
                   
                    // gen tran id
                    $tran_id = 'TR'.date('Ymd').rand(100,999);
                    $transection = new Transection();
                    $transection->TranID = $tran_id;
                    $transection->TranType = 'income';
                    $transection->ProductID = $item['id'];
                    $transection->Qty = $item['qty'];
                    $transection->Price =$item['qty']*$item['price'];
                    $transection->Detail = $item['name'];
                    $transection->save();


                    // update in store
                    $product = Product::find($item['id']);
                    if($product){
                        $product->Qty -= $item['qty'];
                        $product->save();
                    }

                // add bill list
                    
                    $bill_item = new BillItem();
                    $bill_item->BillID = $bill_id;
                    $bill_item->ItemName = $item['name'];
                    $bill_item->Qty = $item['qty'];
                    $bill_item->Price = $item['price'];
                    $bill_item->save();
                    
                    
                }

                $success = true;
                $message = 'ສຳເລັດ';

            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
                $bill_id = null;
            }

            return response()->json([
                'bill_id' => $bill_id,
                'success' => $success,
                'message' => $message,
            ], 201);
        }
    
}
