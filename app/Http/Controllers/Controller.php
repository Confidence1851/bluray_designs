<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function welcomeUser($user){
        $data['title'] = 'New Signup!';
        $data['email'] = $user->email;
        $data['subject'] = 'Welcome on board '.$user->name;
        $data['name'] = $user->name;
        $data['image'] = 'web/img/logo.png';
        Mail::to($data['email'])->send(new WelcomeUser($data));
        return;
    }

    public function post_categories(){
        $data = [
            'Finance',
            'Online Business',
            'Technology',
            'Web Design',
        ];
        return $data;
    }

    public function product_types(){
        $data = [
            'Banner',
            'Cloth',
            'Paper',
        ];
        return $data;
    }

    public function product_categories(){
        $data = [
            'Graphics Design + Printing',
            'Printing',
            'Web Design',
        ];
        return $data;
    }
}
