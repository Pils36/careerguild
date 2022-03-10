<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Redirector;

use JD\Cloudder\Facades\Cloudder;

use Session;

use App\Admin as Admin;

use App\Team as Team;

class TeamController extends Controller
{
    public function adminteampost(Request $req){

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

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/team", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

        }
        else
        {
            $save_url = "https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601509170/careerguild/team/undraw_profile_pic_ic5t_ygfmbw.png";
            
        }



        $team = Team::insert(['name' => $req->name, 'position' => $req->position, 'facebook' => $req->facebook, 'twitter' => $req->twitter , 'instagram' => $req->instagram , 'youtube' => $req->youtube, 'image' => $save_url, 'fav_quote' => $req->editor1]);

        if($team == true){
            // Return response back
                return redirect()->back()->with('success', 'Team Created');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }

    }


    public function adminupdateteam(Request $req){

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

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/team", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

            $team = Team::where('id', $req->id)->update(['name' => $req->name, 'position' => $req->position, 'facebook' => $req->facebook, 'twitter' => $req->twitter , 'instagram' => $req->instagram , 'youtube' => $req->youtube, 'image' => $save_url, 'fav_quote' => $req->editor1]);

        }
        else
        {
            $team = Team::where('id', $req->id)->update(['name' => $req->name, 'position' => $req->position, 'facebook' => $req->facebook, 'twitter' => $req->twitter , 'instagram' => $req->instagram , 'youtube' => $req->youtube, 'fav_quote' => $req->editor1]);
            
        }
        
            return redirect()->back()->with('success', 'Information Updated');

    }



    public function admindeleteteam(Request $req){

        $action = Team::where('id', $req->id)->delete();

        if($action == 1){
            // Return response back
            return redirect()->back()->with('success', 'Deleted Successfully');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }

    }

    
}
