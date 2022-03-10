<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Redirector;

use JD\Cloudder\Facades\Cloudder;

use Session;

use App\Admin as Admin;

use App\Blog as Blog;

use App\BlogComment as BlogComment;

class BlogController extends Controller
{

    public function adminblogpost(Request $req){

        if($req->file('image'))
        {
            //Get filename with extension
            $filenameWithExt = $req->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just extension
            $extension = $req->file('image')->getClientOriginalExtension();

            $image_name = $req->file('image')->getRealPath();

            $publicId = uniqid().'_'.time();

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/blogpost", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

        }
        else
        {
            $save_url = "https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600908762/careerguild/blogpost/LOGO_ARTICLE_19_g6tyiz.jpg";

        }



        $blog = Blog::insert(['subject' => $req->subject, 'post_by' => session('name'), 'message' => $req->editor1, 'image' => $save_url]);

        if($blog == true){
            // Return response back
                return redirect()->back()->with('success', 'Successfully Posted');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }


    }


    public function adminblogedit(Request $req){

        if($req->file('image'))
        {
            //Get filename with extension
            $filenameWithExt = $req->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just extension
            $extension = $req->file('image')->getClientOriginalExtension();

            $image_name = $req->file('image')->getRealPath();

            $publicId = uniqid().'_'.time();

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/blogpost", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

            $blog = Blog::where('id', $req->id)->update(['subject' => $req->subject, 'post_by' => session('name'), 'message' => $req->editor1, 'image' => $save_url]);

        }
        else
        {
            $blog = Blog::where('id', $req->id)->update(['subject' => $req->subject, 'post_by' => session('name'), 'message' => $req->editor1]);

        }





        if($blog == 1){
            // Return response back
                return redirect()->back()->with('success', 'Post Updated');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }


    }


    public function bloggingComment(Request $req){

        if(Session::has('username') == true){
            $email = session('email');
        }
        else{
            $email = $req->email;
        }
        // Add Blog Comment
        $comment = BlogComment::insert(['blog_id' => $req->blog_id, 'name' => $req->name, 'message' => $req->message, 'email' => $email]);

        if($comment == true){
            // Return response back
            return back();
        }
        else{
            $message = "Something went wrong!";
            $response = "error";

            // Return response back
            return redirect()->back()->with($response, $message);
        }


    }


    public function likeBlog(Request $req){

        // Add Blog Comment
        $like = Blog::where('id', $req->id)->get();

        if(count($like) > 0){
            $getLike = $like[0]->likes + 1;

            Blog::where('id', $req->id)->update(['likes' => $getLike]);

            $resData = ['data' => $getLike, 'message' => 'success'];
        }
        else{
            $resData = ['data' => 'Something went wrong', 'message' => 'error'];
        }

        // Return response
        return $this->returnJSON($resData);
    }


    public function returnJSON($data){
        return response()->json($data);
    }

}

