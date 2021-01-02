<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Order;
use App\User;
use App\Picture;
use App\Post;
use App\Product;
use App\Quantity;
use App\Spec;
use App\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'User'){
            $orders = Order::where('user_id',$user->id)->orderby('created_at','desc')->get();
            return view('user.orders',compact('orders'));
        }

        return view('admin.home');
    }

    public function products()
    {
        $products = Product::orderby('created_at','desc')->get();
        return view('admin.products',compact('products'));
    }
    
   
    public function allposts()
    {
        $posts = Post::orderby('created_at','desc')->get();
        return view('admin.posts',compact('posts'));
    }


    public function newproduct()
    {
        $this->deleteproduct();
        $prod_types = $this->product_types();
        $prod_cats = $this->product_categories();
        return view('admin.newproduct',compact('prod_types','prod_cats'));
    }

    public function delproduct($id)
    {
        $this->deleteproduct($id);
        Session::flash('msg','Product deleted successfully');
        return redirect()->back();
    }

    public function addproduct(Request $request,$id = null)
    {
        if(is_null($id)){
            $data = $request->validate([
                'name' => 'required|max:50|unique:products',
                'category' => 'required',
                'type' => 'required',
                'design_price' => 'required',
                'caption' => 'required',
            ]);
            
            $data['status'] = 'Pending';
            $product = Product::create($data);
        }
        else{
            $product = Product::findorfail($id);
            // if($product->name == $request['name']){
            //     $name = 'required|max:50' ;
            // }
            // else{
            //     $name = 'required|max:50|unique:products' ;
            // }
            $data = $request->validate([
                'name' => 'required' ,
                'category' => 'required',
                'type' => 'required',
                'design_price' => 'required',
                'caption' => 'required',
            ]);
            $product->name = $data['name'];
            $product->category = $data['category'];
            $product->type = $data['type'];
            $product->design_price = $data['design_price'];
            $product->caption = $data['caption'];
            $product->save();
        }
        
        return response()->json(['id' => $product->id]);
    }

    

    public function addprodimg(Request $request){
        $data = $request->validate([
            'product_id' => 'required',
            'image' => 'required',
        ]);
        $Image_path = public_path('/product_images');
        
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();

        // create new image with transparent background color
        $background = Image::canvas(350, 260, '#ffffff');
        // read image file and resize it to 262x54
        $img = Image::make($image);
        //Resize image
        $img->resize(350, 260, function ($constraint) {
            $constraint->aspectRatio();
            // $constraint->upsize();
        });

        // insert resized image centered into background
        $background->insert($img, 'center');

        // save
        $background->save($Image_path.'/'.$filename);   


        $data['image'] = $filename;
        $picture = Picture::create($data);
        
        return response()->json(['id' => $picture->id,'image' => $picture->image]);
    }

    public function delprodimg(Request $request){
        $image =Picture::find($request['img_id']);
        $Image_path = public_path('/product_images');
        try{
            unlink($Image_path.'/'.$image->image);
        }
        catch(Exception $e){}
        $image->delete();
        return response()->json(['msg' => 'Image deleted successfully!']);
    }

    public function addquantity(Request $request){
        $data = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
        ]);

        $quan = Quantity::create($data);

        return response()->json(['id' => $quan->id,'quantity' => $quan->quantity,'discount' => $quan->discount]);
    }

    public function delquantity(Request $request){
        $item =Quantity::find($request['id']);
        $item->delete();
        return response()->json(['msg' => 'Item deleted successfully!']);
    }

    public function addproducttype(Request $request){
        $data = $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        $type = Type::create($data);

        return response()->json(['id' => $type->id,'name' => $type->name,'price' => $type->price]);
    }

    public function delproducttype(Request $request){
        $item =Type::find($request['id']);
        $item->delete();
        return response()->json(['msg' => 'Item deleted successfully!']);
    }

    public function addfeature(Request $request){
        $data = $request->validate([
            'product_id' => 'required',
            'text' => 'required',
        ]);

        $feat = Feature::create($data);

        return response()->json(['id' => $feat->id,'text' => $feat->text]);
    }


    public function delfeature(Request $request){
        $item =Feature::find($request['id']);
        $item->delete();
        return response()->json(['msg' => 'Item deleted successfully!']);
    }


    public function addspec(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            // 'caption' => 'required',
            'image' => 'required',
        ]);


        $Image_path = public_path('/spec_images');
        
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();

        // create new image with transparent background color
        $background = Image::canvas(300, 280, '#ffffff');
        // read image file and resize it to 262x54
        $img = Image::make($image);
        
        //Resize image
        $img->resize(300, 280, function ($constraint) {
            $constraint->aspectRatio();
            // $constraint->upsize();
        });

        

        // insert resized image centered into background
        $background->insert($img, 'center');

        
        // save
        $background->save($Image_path.'/'.$filename);   


        $data['image'] = $filename;

        $spec = Spec::create($data);

        Session::flash('msg','Specification added successfully');
        return redirect()->back();
        // return response()->json(['id' => $spec->id,'name' => $spec->name,'caption' => $spec->caption,'img'=> $spec->image]);
    }

    public function delspec(Request $request){
        $spec =Spec::find($request['id']);
        $Image_path = public_path('/spec_images');
        try{
            unlink($Image_path.'/'.$spec->image);
        }
        catch(Exception $e){}
        $spec->delete();
        return response()->json(['msg' => 'Specification deleted successfully!']);
    }


    public function saveproduct($id){
        $product = Product::findorfail($id);
        $product->status = 'Active';
        $product->save();
        Session::flash('msg','Product added successfully');
        return redirect()->route('products');
    }

    public function editproduct($id){
        $product = Product::findorfail($id);
        $prod_types = $this->product_types();
        $prod_cats = $this->product_categories();
        $pics = Picture::where('product_id',$product->id)->get();
        $feats = Feature::where('product_id',$product->id)->get();
        $cats = Spec::where('product_id',$product->id)->distinct()->get('category');
        $quans = Quantity::where('product_id',$product->id)->get();
        $types = Type::where('product_id',$product->id)->get();
        return view('admin.editproduct',compact('product','pics','feats','cats','quans','types','prod_types','prod_cats'));
    }

    public function changestat($id){
        $product = Product::findorfail($id);
        if($product->status == 'Active'){
            $product->status = 'Disabled';
        }
        else{
            $product->status = 'Active';
        }
        $product->save();
        Session::flash('msg','Product updated successfully');
        return redirect()->back();
    }

    private function deleteproduct($id = null){
        if(is_null($id)){
            $products = Product::where('status','Pending')->get();
        }
        else{
            $products = Product::where('id',$id)->get();
        }
        foreach($products as $prod){

            // delete all images and files
            $images =Picture::where('product_id',$prod->id)->get();
            foreach($images as $image){
                $Image_path = public_path('/product_images');
                try{
                    unlink($Image_path.'/'.$image->image);
                }
                catch(Exception $e){}
                $image->delete();
            }

            // delete related quantities
            $quans =Quantity::where('product_id',$prod->id)->get();
            foreach($quans as $quan){
                $quan->delete();
            }

            // delete related types
            $types =Type::where('product_id',$prod->id)->get();
            foreach($types as $type){
                $type->delete();
            }

            // delete related features
            $feats =Feature::where('product_id',$prod->id)->get();
            foreach($feats as $feat){
                $feat->delete();
            }

            // delete all specs and files
            $specs =Spec::where('product_id',$prod->id)->get();
            foreach($specs as $spec){
                $Image_path = public_path('/product_images');
                try{
                    unlink($Image_path.'/'.$spec->image);
                }
                catch(Exception $e){}
                $spec->delete();
            }
            
            // finally delete product
            $prod->delete();
        }
        return;
    }

    public function newpost(){
        $post = new Post();
        $post_cats = $this->post_categories();
        return view('admin.post',compact('post','post_cats'));
    }

    public function savepost(Request $request){
        $id = $request['id'];
        if(is_null($id)){
            $title = 'required|unique:posts|max:40';
            $reqImg = 'required';
        }
        else{
            $post = Post::findorfail($id);
            if($post->title == $request['title']){
                $title = 'required' ;
            }
            else{
                $title = 'required|unique:posts|max:40';
            }
            $reqImg = 'nullable';

        }
        $data = $request->validate([
            'title' => $title,
            'message' => 'required',
            'category' => 'required',
            'status' => 'required',
            'image' => $reqImg,
        ]);
        $user = Auth::user();

        if(!empty($request['image'])){

            $Image_path = public_path('/post_images');
            
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();

            // create new image with transparent background color
            $background = Image::canvas(870, 350, '#ffffff');
            // read image file and resize it to 262x54
            $img = Image::make($image);
            
            //Resize image
            $img->resize(870, 350, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });

            

            // insert resized image centered into background
            $background->insert($img, 'center');

            
            // save
            $background->save($Image_path.'/'.$filename);   


            $data['image'] = $filename;
        }

        $data['user_id'] = $user->id;
        $data['slug'] =  Str::slug($data['title']);

        if(is_null($id)){
            $post = Post::create($data);
        }
        else{
            $post->update($data);
            // $post->save();
            // dd($post);

        }
        Session::flash('msg','Post submitted sucessfully');
        return redirect()->route('allposts');
    }

    public function editpost($id){
        $post = Post::findorfail($id);
        $post_cats = $this->post_categories();
        return view('admin.post',compact('post','post_cats'));
    }
    
    public function updateRole(Request $request ,$id){
        $request->validate([
            'role' => 'required',
        ]);
        $user = User::findorfail($id);
        $user->role = $request['role'];
        $user->save();
        return redirect()->back()->with('success','Role updated!');
    }

    

}
