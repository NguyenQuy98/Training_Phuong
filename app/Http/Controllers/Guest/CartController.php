<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use App\Size;
use App\Model\HomeModel;

class CartController extends Controller
{
    public function Cart_User($id)
    {
       
        $product = Product::find($id);
        $size = Product::find($product->id);
        $size_name = $size->size['name'];
       
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => '1',
            'options' => [
                'image' =>$product->main_image,
                'size' =>$size_name,
            ]
        ]);
        
        return redirect()->route('guest.product');
    }
    public function Cart()
    { 
        $HomeModel = new HomeModel();
        $cart = Cart::content();
        return view('guest.cart',['carts'=>$cart,
        'categories'   =>$HomeModel->getCategory()
        ]);
    }
    public function minus($id)
    {
        $item = Cart::content()->where('id',$id)->first();
        Cart::update($item->rowId,$item->qty-1);
        $item = Cart::content()->where('id',$id)->first();
        echo $item->subtotal;
    }
    public function plus($id)
    {
        $item = Cart::content()->where('id',$id)->first();
        Cart::update($item->rowId,$item->qty+1);
        $item = Cart::content()->where('id',$id)->first();
        // $item->price;
        // $total = Cart::total($item);
        // echo $total;
        echo $item->subtotal;
    }
    public function delete($id)
    {
        $item = Cart::content()->where('id',$id)->first()->rowId;
        Cart::remove($item);
        return redirect()->route('guest.cart');
    }
}
