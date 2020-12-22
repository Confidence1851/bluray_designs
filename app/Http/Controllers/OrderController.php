<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Spec;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function place_order(Request $request){
        // return response()->json($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'comment' => 'nullable',
            'product_id' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'help_me' => 'required',
            'design' => 'nullable',
            'type' => 'required',
            'spec' => 'nullable',
        ]);
        
        $product = Product::find($data['product_id']);
        // if(empty($product)){
        //     return response()->json(['color' => 'red','msg' => 'Couldn`t validate product' ]);
        // }
        

        if($data['help_me'] == 0){
            $help = 'No';
            $help_price = 0;
        }
        else{
            $help = 'Yes';
            $help_price = $product->design_price ?? 0;
        }

        $q = explode('|',$data['quantity']);
        $quan['id'] =  $q[0];
        $quan['quan'] =  $q[1];
        $quan['disc'] =  $q[2];

        $t = explode('|',$data['type']);
        $type['id'] = $t[0];
        $type['price'] = $t[1];
        
        $getSpecPrices = 0;
        if(!empty($data['spec'])){
            $specs = explode(',',$data['spec']);
            $getSpecs = ''; 
            $getSpecPrices = 0;
            foreach($specs as $spec){
                $check = Spec::whereId($spec)->first();
                if(!empty($check)){
                    $getSpecs = $getSpecs.$check->category.': '.$check->name.', ';
                    $getSpecPrices  = $getSpecPrices+$check->price;
                }
            }

            $data['spec'] = $getSpecs;
            $getSpecPrices = $getSpecPrices;
        }

        $sumPrice = (($quan['quan'] * $type['price']) - $quan['disc']);

        $data['quantity'] = $quan['quan'];
        $findType = Type::find($type['id']);
        $data['type'] = $findType->name;
        $data['price'] = $sumPrice + $getSpecPrices + $help_price;
        $data['help_me'] = $help;

        if(!empty($request['design'])){
            $image = $request->file('design');
            $filename = time().'-'.$image->getClientOriginalName();
            $image->move(public_path('/custom_designs'),$filename);
            $data['design'] = $filename;
        }
        
        if(Auth::check()){
             $user = Auth::user();
             $user->address = $data['address'];
             $user->save();
             $data['user_id'] = $user->id;
        }

        $data['pay_ref'] = time();

        $data['order_ref'] = time();
        $order = Order::create($data);
        $this->orderMail($order);
        return response()->json(['color' => 'green','msg' => 'Order placed successfully <br> Order Reference: #'.$data['order_ref'].'. <br> Kindly check your email for the order invoice or login to your account if you registered with the provided email to see your order history!.' ]);
    }
    
    public function orderMail($order){
        $data['title'] = 'Order placed successfully!';
        $data['email'] = $order->email;
        $data['subject'] = 'Hello '.$order->name.' , your order has been received!';
        $data['order'] = $order;
        $data['image'] = 'web/img/logo.png';
        Mail::to($data['email'])->send(new NewOrder($data));
    }

    public function index(){
        $orders = Order::orderby('created_at','desc')->get();
        return view('admin.orders',compact('orders'));
    } 
    
    public function update_order(Request $request, $id){
        $order = Order::findorfail($id);
        $order->status = $request['status'];
        $order->save();
        return redirect()->back()->with('status','Order status updated');
    }
}
