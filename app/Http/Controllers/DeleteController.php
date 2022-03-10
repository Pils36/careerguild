<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin as Admin;

use App\Blog as Blog;

use App\BlogComment as BlogComment;

use App\Events as Events;

use App\Team as Team;

use App\User as User;

use App\Subscriber as Subscriber;

use App\CareerstaterSeries as CareerstaterSeries;

use App\CareerstaterSeriesComment as CareerstaterSeriesComment;


class DeleteController extends Controller
{
    public function deleteposts(Request $req){

        switch ($req->val) {
            case "blog":
                    $del = Blog::where('id', $req->id)->delete();
                    BlogComment::where('blog_id', $req->id)->delete();

                    if($del == 1){
                        $resData = ['title' => 'Good!', 'res' => 'Blog post deleted successfully!', 'message' => 'success'];
                    }
                    else{
                        $resData = ['title' => 'Oops!', 'res' => 'Something went wrong!', 'message' => 'error'];
                    }
                break;
            case "css5":
                    $del = CareerstaterSeries::where('id', $req->id)->delete();
                    CareerstaterSeriesComment::where('blog_id', $req->id)->delete();

                    if($del == 1){
                        $resData = ['title' => 'Good!', 'res' => 'CSS5 post deleted successfully!', 'message' => 'success'];
                    }
                    else{
                        $resData = ['title' => 'Oops!', 'res' => 'Something went wrong!', 'message' => 'error'];
                    }
                break;
            case "event":
                    $del = Events::where('id', $req->id)->delete();

                    if($del == 1){
                        $resData = ['title' => 'Good!', 'res' => 'Event post deleted successfully!', 'message' => 'success'];
                    }
                    else{
                        $resData = ['title' => 'Oops!', 'res' => 'Something went wrong!', 'message' => 'error'];
                    }
                break;

            default:
                $resData = ['title' => 'Oops!', 'res' => 'Unrecognized request', 'message' => 'info'];
        }

        // Return response
        return $this->returnJSON($resData);
    }


    public function returnJSON($data){
        return response()->json($data);
    }
}
