<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function allposts()
    {
        $posts = Post::orderby('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }


    public function newpost()
    {
        $post = new Post();
        $post_cats = $this->post_categories();
        return view('admin.posts.edit', compact('post', 'post_cats'));
    }

    public function savepost(Request $request)
    {
        $id = $request['id'];
        if (is_null($id)) {
            $title = 'required|unique:posts|max:100';
            $reqImg = 'required';
        } else {
            $post = Post::findorfail($id);
            if ($post->title == $request['title']) {
                $title = 'required';
            } else {
                $title = 'required|unique:posts|max:100';
            }
            $reqImg = 'nullable';
        }
        $data = $request->validate([
            'title' => "$title|string",
            'message' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'image' => $reqImg . "|image",
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ]);

        $user = auth()->user();
        if (!empty($request['image'])) {

            $Image_path = public_path('/post_images');

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

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
            $background->save($Image_path . '/' . $filename);
            $data['image'] = $filename;
        }

        $data['user_id'] = $user->id;
        $data['slug'] =  slugify($data['title']);

        if (is_null($id)) {
            $post = Post::create($data);
        } else {
            $post->update($data);

        }
        session()->flash('msg', 'Post submitted sucessfully');
        return redirect()->route('allposts');
    }

    public function editpost($id)
    {
        $post = Post::findorfail($id);
        $post_cats = $this->post_categories();
        return view('admin.posts.edit', compact('post', 'post_cats'));
    }

    public function comments($id)
    {
        $post = Post::findorfail($id);
        $comments = Comment::where("post_id" , $id)->orderby("id" , "desc")->paginate(20);
        return view('admin.posts.comments', compact('post', 'comments'));
    }
}
