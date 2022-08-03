<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Detaile;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addorder(Request $request){
        $user=new User();
        $user->name=$request->customer_name;
        $user->phone=$request->customer_phone;
        $user->save();
        $order=new Order();
        $order->order_amount=$request->amount;
        
        $order->user_id=$user->id;
        $order->save();
       
        for($i=0;$i< count($request->ids);$i++)
         {  $detailes=new Detaile();
             $detailes->product_id=$request->ids[$i];
             $detailes->order_id=$order->id;
             $detailes->save();
              }
        return response()->json('created successfully');
    }
    //////////////////////////getorders/////////////////
   public function orders(){
       $orders=Order::with('belongstouser')->get();
       return response()->json($orders);
   }
   ///////////////////////////////////////////detailes/////////////
   public function detailes($id){
       $arrofproducts=[];
      $detailes=Detaile::where('order_id',$id)->get();
      for($i=0;$i< count($detailes);$i++){
           $ele=Product::with('belongstoitems')->where('id',$detailes[$i]->product_id)->first();
           $arrofproducts[$i]=$ele;
      }
      return response()->json($arrofproducts);
   }
}
