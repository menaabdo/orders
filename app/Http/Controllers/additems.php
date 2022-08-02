<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;
class additems extends Controller
{
    public function additem(Request $request){
          $item=new Item();
          $item->name=$request->name;
          $item->price=$request->price;
          if($request->file('img'))
         { $image=$request->file('img');
          $imgName = time() . $image->getClientoriginalExtension();
          $image->move('imgs', $imgName);
          $item->img=asset('imgs/'.$imgName);}
          else{
              $item->img=asset('imgs/default.jpg');
          }
          $item->save();
          if($request->sizes){
              
              $arr1=json_decode($request->sizes);
              $arr2=json_decode($request->prices);
              for($i=0;$i<count($arr1);$i++){
                
                  if($arr1[$i]!='')
               { $product=new Product();
                $product->size_name=$arr1[$i];
                if($arr2[$i]!='')
                $product->size_price=$arr2[$i];
        
                $product->item_id=$item->id;
                $product->save();
               }
               
              }
             
          }

         

          return response()->json('added successfully');
    }

   public function getallitemes(){
       $allitems=Item::with('hasproducts')->get();
   
       return response()->json($allitems);
   }
   public function getallproducts(){
       $allproducts=Product::with('belongstoitems')->get();
       return response()->json($allproducts);
   }
  public function deleteitem(Request $request){
       $item=Item::find($request->id);
       $item->delete();
       return response()->json($item);

   }
}
