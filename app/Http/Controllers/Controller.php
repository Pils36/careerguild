<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Mail;
//Mail
use App\Mail\sendMail;

use Share;

use App\Blog as Blog;
use App\Team as Team;
use App\Subscriber as Subscriber;
use App\Events as Events;
use App\Activity as Activity;
use App\Youtube as Youtube;
use App\BlogComment as BlogComment;
use App\CareerstaterSeries as CareerstaterSeries;
use App\CareerstaterSeriesComment as CareerstaterSeriesComment;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $subject;
    public $message;
    public $to = "support@careerguild.com.ng";
    public $file;

    // Get Counts
    public function blogCount(){
        $getBlog = Blog::all()->count();

        return $getBlog;
    }

    public function eventCount(){
        $getEvents = Events::all()->count();

        return $getEvents;
    }

    public function subscriberCount(){
        $getSubscriber = Subscriber::all()->count();

        return $getSubscriber;
    }

    public function teamCount(){
        $getTeam = Team::all()->count();

        return $getTeam;
    }

    public function activityCount(){
        $getActivity = Activity::all()->count();

        return $getActivity;
    }

    public function css5Count(){
        $getcss5 = CareerstaterSeries::all()->count();

        return $getcss5;
    }

    public function getallBlog(){
        $blogData = Blog::orderBy('created_at', 'DESC')->paginate(2);

        return $blogData;
    }


    public function getallcss5(){
        $css5Data = CareerstaterSeries::orderBy('created_at', 'DESC')->paginate(2);

        return $css5Data;
    }

    public function getallEvent(){
        $eventData = Events::orderBy('created_at', 'DESC')->paginate(5);

        return $eventData;
    }

    // Expired Event
    public function expiredEvent(){
        $today = date('m/d/Y');

        $getEvent = Events::where('event_end_date', '<', $today)->get();


        if(count($getEvent) > 0){
            foreach($getEvent as $key => $value){
                // Update Event
                Events::where('id', $value->id)->update(['status' => 0]);
            }
        }
    }


    public function getfrontEvent(){
        $eventData = Events::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);

        return $eventData;
    }


    public function getallTeam(){
        $teamData = Team::orderBy('created_at', 'DESC')->get();

        return $teamData;
    }

    public function getallSubscriber(){
        $subData = Subscriber::orderBy('created_at', 'DESC')->get();

        return $subData;
    }
    public function getallSubscribed(){
        $subData = Subscriber::where('status', 1)->orderBy('created_at', 'DESC')->get();

        return $subData;
    }

    public function getfrontTeam(){
        $teamData = Team::orderBy('created_at', 'DESC')->take(6)->get();

        return $teamData;
    }

    public function getallBlogdata(){
        $allblogData = Blog::orderBy('created_at', 'DESC')->paginate(3);

        return $allblogData;
    }

    public function getallCss5data(){
        $allcss5Data = CareerstaterSeries::orderBy('created_at', 'DESC')->paginate(3);

        return $allcss5Data;
    }

    public function getallBloghome(){
        $bloghomeData = Blog::orderBy('created_at', 'DESC')->take(3)->get();

        return $bloghomeData;
    }

    public function teamMember($id){
        $teamData = Team::where('id', $id)->get();

        return $teamData;
    }

    public function myblogDetail($id){
        $blogdetailData = Blog::where('id', $id)->get();

        return $blogdetailData;
    }

    public function myeventDetail($id){
        $eventdetailData = Events::where('id', $id)->get();

        return $eventdetailData;
    }

    public function myblogcomment($id){
        $blogcommentData = BlogComment::where('blog_id', $id)->orderBy('created_at', 'DESC')->get();

        return $blogcommentData;
    }

    public function mycss5Detail($id){
        $css5detailData = CareerstaterSeries::where('id', $id)->get();

        return $css5detailData;
    }

    public function mycss5comment($id){
        $css5commentData = CareerstaterSeriesComment::where('blog_id', $id)->orderBy('created_at', 'DESC')->get();

        return $css5commentData;
    }


    public function sharethisLink($url, $title){
        $linktie = Share::page($url, $title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->getRawLinks();

        return $linktie;
    }

                // Mail Sender
    public function sendMail($objDemoa, $purpose){
      $objDemo = new \stdClass();
      $objDemo->purpose = $purpose;

        if($purpose == $this->subject){
            $objDemo->subject = $this->subject;
            $objDemo->message = $this->message;
            $objDemo->file = $this->file;
        }

        Mail::to($objDemoa)
            ->send(new sendMail($objDemo));
    }

}
