<?php

namespace App\Http\Controllers\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Utils;
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

class MainController extends Controller
{
    public function main()
    {
        $HomeModel = new HomeModel();
        return view('guest.home',[
            'products'=>$HomeModel->getProduct(),
            'slides'  =>$HomeModel->getSlideShows(),
            'gallerys'=>$HomeModel->getGallery(),
            'blogs'   =>$HomeModel->getBlog(),
            'categories'   =>$HomeModel->getCategory()
            ]);
    }
    
   
    public function contact()
    {
        $HomeModel = new HomeModel();
        return view('guest.contact',[
            'categories'   =>$HomeModel->getCategory()
        ]);
    }
    public function getProductByCategory($slug)
    {
        $HomeModel = new HomeModel();
        

        $category = Category::where('slug',$slug)->firstOrFail();

        $products = Product::where('category_id',$category->id)->paginate(6);
        
        
        return view('guest.product',['products'=>$products,
        'categories'   =>$HomeModel->getCategory(),
        ]);

    }
      
    
    public function getProduct()
    {
        $products = Product::paginate(12);
        $HomeModel = new HomeModel();
        return view('guest.product',['products'=>$products,
        'categories'   =>$HomeModel->getCategory(),
        ]);
    }
    
    // public function cart()
    // {  
    //     $HomeModel = new HomeModel();
    //     return view('guest.cart'
    //     ,[
    //         'categories'   =>$HomeModel->getCategory()
    //     ]);
    // }
    // <a href="{{ route('guest.cart_order',['id'=> {{ Auth::user()->id }} ])}}">
    // public function cart_order($id)
    // {
    //     $cart_order = Product::find($id);
        
    //     $HomeModel = new HomeModel();
    //     return view('guest.cart',['cart_order'=>$cart_order,
    //         'categories'   =>$HomeModel->getCategory()
    //     ]);
    // }
    public function blog()
    {
        $product = Product::where('is_featured',1)->get();
        $HomeModel = new HomeModel();
        return view('guest.blog',['blogs'=>$HomeModel->getBlog(),
        'categories'   =>$HomeModel->getCategory(),
        'product'      =>$product
        ]);
    }
    public function blog_detail()
    {
        $product = Product::where('is_featured',1)->get();
        $HomeModel = new HomeModel();
        return view('guest.blog-detail',[
            'categories'   =>$HomeModel->getCategory(),
            'blogDetail'   => $HomeModel->searchBlog(),
            'product'      =>$product
        ]);
    }
    public function about()
    {
        $HomeModel = new HomeModel();
        return view('guest.about',
        ['abouts'=>$HomeModel->whereAbout(),
         'heading_pages'=>$HomeModel->getHeading_pages(),
        'categories'   =>$HomeModel->getCategory()
        ]);
    }
    public function product_detail($id)
    {
        $product_image = Product::find($id);  
        $size = Product::find($id);
        // $size1 = Product::find(1);
        
        // $id = (int)$request->id;
        // $product = App\ProductImage::find($id);
        
        $HomeModel = new HomeModel();
        return view('guest.product-detail',['product_detail'=>$product_image,
            'product' =>$HomeModel->searchProduct($id),
            'categories'   =>$HomeModel->getCategory(),
            'products'=>$HomeModel->getProduct(),
            'sizes' =>$size
        ]
    );
    }

    
    // public function postLogin(Request $req)
    // {
    //     if($req->isMethod('post')){
    //         $data = $req->input();
    //         if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1' ])){
    //             echo"thanh cong";die;
    //         }
    //         echo"that bai";die;
    //     }
    //     return view('/');
    // }

    // public function postRegister(Request $req)
    // {
    //     $this->validate($req,
    //         [
    //             'email'=>'required|email|unique:uses,email',
    //             'password' =>'required|min:6|max:20',
    //             'name' => 'required'
            
    //         ],[
    //             'email.emal' => 'Không đúng định dạng email',
    //             'email.unique' =>' Email đã có người sử dụng',
    //             'password.min' => 'Mat khau ít nhất 6 ký tự'
    //         ]
    //         );
    //         $user = new User();
    //         $user->name = $req->username;
    //         $user->email = $req->emailDK;
    //         $user->password = Hash::make($req->passwordDK);
    //         return redirect()->back()->whith('DK','Đăng ký thành công');
    // }
    public function getSearch(Request $req)
    {
        $HomeModel = new HomeModel();
        $product = Product::where('name','like','%'.$req->search.'%')->orWhere('price',$req->search)->paginate(6);
        return view('guest.product',['products'=>$product,
        'categories'   =>$HomeModel->getCategory()
        ]);
    }
    public function getSearchBlog(Request $req)
    {
        $product = Product::where('is_featured',1)->get();
        $HomeModel = new HomeModel();
        $blog = Blog::where('name','like','%'.$req->search.'%')->orWhere('title','like','%'.$req->search.'%')->paginate(4);
        return view('guest.blog',['blogs'=>$blog,
        'categories'   =>$HomeModel->getCategory(),
        'product'      =>$product
        ]);
    }
}
