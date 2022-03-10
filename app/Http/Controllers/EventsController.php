<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Redirector;

use JD\Cloudder\Facades\Cloudder;

use Session;

use App\Admin as Admin;

use App\Events as Events;

class EventsController extends Controller
{
    public function admineventpost(Request $req){


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

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/events", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

        }
        else
        {
            $save_url = "https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601091829/careerguild/events/2018ACE-1045_hikiap.jpg";

        }

        $eventdate = explode(" - ", $req->daterange);

        $event = Events::insert(['event_name' => $req->name, 'event_start_time' => $req->event_start_time, 'event_end_time' => $req->event_end_time, 'event_start_date' => $eventdate[0], 'event_end_date' => $eventdate[1], 'event_description' => $req->editor1, 'event_url' => $req->location, 'status' => $req->status, 'image_url' => $save_url]);

        if($event == true){
            // Return response back
                return redirect()->back()->with('success', 'Event Successfully Posted');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function admineventedit(Request $req){


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

            Cloudder::upload($image_name, $publicId, $options = array("attachment"=>true, "folder" => "careerguild/events", "flags"=>"attachment"));

            list($width, $height) = getimagesize($image_name);

        $image_url= Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //    dd($image_url);

        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_url);

            $save_url = $withoutExt.'.'.$extension;

            $eventdate = explode(" - ", $req->daterange);

        $event = Events::where('id', $req->id)->update(['event_name' => $req->name, 'event_start_time' => $req->event_start_time, 'event_end_time' => $req->event_end_time, 'event_start_date' => $eventdate[0], 'event_end_date' => $eventdate[1], 'event_description' => $req->editor1, 'event_url' => $req->location, 'status' => $req->status, 'image_url' => $save_url]);

        }
        else
        {
            $eventdate = explode(" - ", $req->daterange);

            $event = Events::where('id', $req->id)->update(['event_name' => $req->name, 'event_start_time' => $req->event_start_time, 'event_end_time' => $req->event_end_time, 'event_start_date' => $eventdate[0], 'event_end_date' => $eventdate[1], 'event_description' => $req->editor1, 'event_url' => $req->location, 'status' => $req->status]);



        }

            if($event == 1){
        // Return response back
                return redirect()->back()->with('success', 'Event Successfully Updated');
            }
            else{
                // Return response back
                return redirect()->back()->with('error', 'Something went wrong!');
            }


    }
}
