<?php

namespace App\Http\Controllers;

use App\Comment;
use App\ContactUs;
use App\Picture;
use App\Post;
use App\Product;
use App\Quantity;
use App\Spec;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class WebController extends Controller
{
    public function read_file($path)
    {
        return getFileFromPrivateStorage(decrypt($path));
    }
    
    public function index()
    {
        $products = Product::where('status','Active')->orderby('created_at','desc')->limit(8)->get();
        return view('web.home',compact('products'));
    }


    public function all_products()
    {
        $products = Product::where('status','Active')->orderby('name','asc')->get();
        return view('web.products',compact('products'));
    }

    public function productdetail( $product)
    {
        $product = Product::findorfail($product);
        $images = Picture::where('product_id',$product->id)->orderby('created_at','desc')->get();
        $quantities = Quantity::where('product_id',$product->id)->orderby('quantity','asc')->get();
        $types = Type::where('product_id',$product->id)->orderby('price','asc')->get();
        $cats = Spec::where('product_id',$product->id)->distinct()->get('category');
        return view('web.product_detail',compact('product','images','quantities','types','cats'));
    }

    public function portfolio($name){
        $products = Product::where('status','Active')->orderby('name','asc')->get();
        return view('web.portfolio',compact('products','name'));
    }
    public function blog()
    {
        $post_cats = $this->post_categories();
        $posts = Post::where('status',1)->orderby('created_at','desc')->get();
        $latests = Post::orderby('updated_at','desc')->paginate(10);
        return view('web.blog',compact('posts','post_cats','latests'));
    }

    public function blogpost($id,$slug){
        $post = Post::findorfail($id);
        $comments = Comment::where('post_id',$post->id)->get();
        $relates = Post::where('id','<>',$post->id)->where('category',$post->category)->orderby('updated_at','desc')->paginate(10);
        return view('web.post-info',compact('post','comments','relates'));
    }
    public function brand (){
    
        return view('admin.brand4freevote');
    }

    public function comment(Request $request){
        if(Auth::check()){
            $user_id = 'required';
            $name = 'nullable';
        }
        else{
            $user_id = 'nullable';
            $name = 'required';
        }
        $data = $request->validate([
            'user_id' => $user_id,
            'post_id' => 'required',
            'name' => $name,
            'message' => 'required',
        ]);
        $comment = Comment::create($data);

        if(Auth::check()){
            $uName = Auth::user()->name;
        }
        else{
            $uName = $data['name'];
        }

        $date = date('D, M d Y',strtotime($comment->created_at));
        return response()->json(['date'=>$date, 'name'=> $uName, 'msg'=>$comment->message]);
    }

    public function contact(){
        return view('web.contact');
    }

    public function contactMsg(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'name' => 'required',
        ]);
        $contact = ContactUs::create($data);
        Mail::to(env('CONTACT_MAIL') ?? env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));

        return redirect()->back()->withStatus('submitted');
    }

    public function about_us(){
        return view('web.about_us');
    }
}


