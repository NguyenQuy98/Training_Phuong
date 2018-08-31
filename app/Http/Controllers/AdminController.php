<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\HomeModel;
use App\Product;
use App\ProductImage;
use App\Category;
use App\Size;
use App\Blog;
use App\Http\Controllers\Auth;
use App\User;
use Input;

class AdminController extends Controller
{
    public function index()
    {
        $product = Product::paginate(6);
        return view('admin.index',[
            'products'=> $product
        ]);
    }
    public function delete($id)
    {
        

        $product =  Product::findOrFail($id);
        $sizes = $product->sizes;
        // dd( $product);

        foreach($sizes as $size){
            $product->sizes()->detach($size->id);
        }
        $images = $product->images; 
        foreach($images as $img){
            $img = $img->delete();
            // unlink($product->productPicture); 
        }
        // khi xóa những sản phẩm mà đã được user_order chọn mua thì khong duoc xoa
        // $user = $product->User; 
        // foreach($user as $user){
        //     $user = $user->delete();
        //     // unlink($product->productPicture); 
        // }
        $product->delete();
        
        return redirect('/admin')->with('msg',"Product delete successfully");
    }
    public function getProduct()
    {
        $HomeModel = new HomeModel();
        return view('admin.add-product',['categories'   =>$HomeModel->getCategory()]);
    }
    public function addProduct(Request $req)
    {
        $HomeModel = new HomeModel();
        if($req->isMethod('post'))
        {
            // $image_product = $req->file('image')->store('images');
            $imageName = $req->file('image');
		    $fullNameFile =  $imageName->getClientOriginalName();
            
            $imageName->move(public_path('images/'), $fullNameFile);
            $data = 0;
        

            Product::insert([
                'category_id'=> $req->input('category'),
                'name'=> $req->input('itemName'),
                'main_image'=> $fullNameFile, 
                'is_featured' => $data,
                'status' => $data,
                'flag' => $data,
                'short_description' => $data,
                'new_price' =>$req->input('price'),
                'description'=> $req->input('description'),
                'price'=> $req->input('price'),
                'expired_time'=> $req->input('datetime'),
                'amount'=> $req->input('amount')
                
            ]);   
           
		
        }


        return view('admin/add-product',['categories'   =>$HomeModel->getCategory()]);
    }
    //Edit product
    public function getEditProduct($id)
    {
        $HomeModel = new HomeModel();
        $product =  Product::findOrFail($id);
        return view('admin.edit-product',['products'   =>$product,
        'categories'   =>$HomeModel->getCategory()
        ]);
    }
    public function postEditProduct(Request $req, $id)
    {
        $product =  Product::findOrFail($id);
        $HomeModel = new HomeModel();
        if($req->isMethod('post'))
        {
            // $image_product = $req->file('image')->store('images');
            $imageName = $req->file('image');
		    $fullNameFile =  $imageName->getClientOriginalName();
            
            $imageName->move(public_path('images/'), $fullNameFile);
            $data = 0;
            $product->category_id= $req->category_edit;
            $product->name= $req->itemName;
            $product->main_image= $fullNameFile;
            $product->is_featured = $data;
            $product->status = $data;
            $product->flag = $data;
            $product->short_description = $data;
            $product->new_price =$req->price;
            $product->description= $req->description;
            $product->price= $req->price;
            $product->expired_time= $req->datetime;
            $product->amount= $req->amount;
            $product->save();
		
        }


        return view('admin/add-product',['categories'   =>$HomeModel->getCategory()]);
    }
    
    //Product Type
    public function ProductType()
    {
        $category = Category::all();
        return view('admin.category',['categories'   =>$category]);
    }
    public function delete_category($id)
    {
        $category =  Category::findOrFail($id);

        if($category['perent_id'] == 1)
        {
            $product = $category->product_category; 
            foreach($product as $item){
                $item = $item->delete();
            
            }
            $category->delete();
            
            
        }
        else if($category['perent_id'] == 0)
        {
            
            echo "Sau khi thực tập sẽ phát triển thêm nên không thể xóa các loại có perent bằng 0";die();
        }
        return redirect('ProductType')->with('msg',"Product delete successfully");
    }
   
    public function getProductType()
    {
        return view('admin.add-category');
    }
    public function addProductType(Request $req)
    {
        if($req->isMethod('post'))
        {
            Category::insert([
                'name'      => $req->input('Name'),                
                'slug'      => $req->input('Slug'), 
                'status'    => $req->input('Status'),
                'perent_id' => $req->input('Perent')
                
            ]);		
        }


        return view('admin.add-category');
    }

    //Edit Type
    public function getEditType($id)
    {
        $HomeModel = new HomeModel();
        $type =  Category::findOrFail($id);
        return view('admin.edit-category',['categorys'   =>$type
        ]);
    }
    public function postEditType(Request $req, $id)
    {
        $type =  Category::findOrFail($id);
        $HomeModel = new HomeModel();
        if($req->isMethod('post'))
        {
            $type->name= $req->Name;
            $type->slug= $req->Slug;
            $type->status= $req->Status;
            $type->perent_id = $req->Perent;
            
            $type->save();
		
        }


        return view('admin.edit-category',['categorys'   =>$type
        ]);
    }


    // User Account
    public function User_Account()
    {
        $user = User::all();
        return view('admin.User-Account',['users'   =>$user]);
    }
    public function delete_user($id)
    {
        $user =  User::findOrFail($id);

        if($user['role'] == 1)
        {
            $user->delete();
        }
        else if($user['role'] == 0)
        {
            
            echo "Account nay của admin bạn khong xoa dc";die();
        }
        return redirect('User-Account')->with('msg',"Product delete successfully");
    }
    // User Cart
    public function User_Cart()
    {
        // $user = User::all();
        // return view('admin.User-Account',['users'   =>$user]);
        return 1;
    }
}
