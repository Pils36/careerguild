<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Redirector;

use JD\Cloudder\Facades\Cloudder;

use Session;

use Share;

use App\Admin as Admin;

use App\Blog as Blog;


class AdminController extends Controller
{

    public function index(){

        if(Session::has('username') == true){

            $data = array([
                'blogcount' => $this->blogCount(),
                'eventcount' => $this->eventCount(),
                'subscribercount' => $this->subscriberCount(),
                'teamcount' => $this->teamCount(),
                'activitycount' => $this->activityCount(),
                'css5count' => $this->css5Count(),
            ]);




            return view('admin.pages.index')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }
    }



    public function blogpost(){
        if(Session::has('username') == true){

            return view('admin.pages.blogpost');

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function blogedit(Request $req, $id){
        if(Session::has('username') == true){

            $data = array([
                'blogdata' => $this->myblogDetail($id)
            ]);


            return view('admin.pages.blogedit')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function css5edit(Request $req, $id){
        if(Session::has('username') == true){

            $data = array([
                'blogdata' => $this->mycss5Detail($id)
            ]);


            return view('admin.pages.css5edit')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function css5post(){
        if(Session::has('username') == true){

            return view('admin.pages.css5post');

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function createevent(){
        if(Session::has('username') == true){

            return view('admin.pages.createevent');

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function eventedit(Request $req, $id){
        if(Session::has('username') == true){

            $data = array([
                'blogdata' => $this->myeventDetail($id)
            ]);

            return view('admin.pages.eventedit')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function createteam(){
        if(Session::has('username') == true){

            return view('admin.pages.createteam');

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function allteam(){
        if(Session::has('username') == true){

            $data = array([
                'teamdata' => $this->getallTeam()
            ]);

            return view('admin.pages.viewteam')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function subscriber(){
        if(Session::has('username') == true){

            $data = array([
                'subscriber' => $this->getallSubscriber()
            ]);

            return view('admin.pages.subscriber')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function messagesubscriber(){
        if(Session::has('username') == true){

            $data = array([
                'subscriber' => $this->getallSubscribed()
            ]);

            return view('admin.pages.messagesubscriber')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function blogview(){
        if(Session::has('username') == true){



            $data = array([
                'blogdata' => $this->getallBlog()
            ]);


            return view('admin.pages.blogview')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function css5view(){
        if(Session::has('username') == true){

            $data = array([
                'blogdata' => $this->getallcss5()
            ]);


            return view('admin.pages.css5view')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function viewevent(){
        if(Session::has('username') == true){

            $data = array([
                'eventdata' => $this->getallEvent()
            ]);


            return view('admin.pages.viewevent')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }

    public function team(Request $req, $id){
        if(Session::has('username') == true){

            $data = $this->teamMember($id);


            return view('admin.pages.teamprofile')->with(['data' => $data]);

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function lockscreen(){
        if(Session::has('username') == true){

            return view('admin.pages.lockscreen');

        }
        else{
            return redirect('/admin/login')->with('error', 'Session Timed Out!');
        }


    }


    public function login(){

        return view('admin.pages.login');
    }



    public function adminlogin(Request $req){


        $admin = Admin::where('username', $req->username)->get();

        if(count($admin) > 0){
            if(Hash::check($req->password, $admin[0]->password)){

                $req->session()->put(['name' => $admin[0]->name, 'username' => $req->username, 'email' => $admin[0]->email, 'role' => $admin[0]->role]);

                return redirect()->route('admin');
            }
            else{
                // Return response back
                return redirect('/admin/login')->with('error', 'Incorrect password!');
            }
        }
        else{
            // Return response back
            return redirect('/admin/login')->with('error', 'Invalid username');
        }


    }


    public function adminpasswordchange(Request $req){


        $admin = Admin::where('username', $req->username)->get();

        if(count($admin) > 0){
            if(Hash::check($req->oldpassword, $admin[0]->password)){

                // Update Password
                $update = Admin::where('username', $req->username)->update(['password' => Hash::make($req->newpassword)]);

                if($update == 1){
                    // Return response back
                    return redirect()->back()->with('success', 'Password updated');
                }
                else{
                    return redirect()->back()->with('error', 'Something went wrong!');
                }
            }
            else{
                // Return response back
                return redirect()->back()->with('error', 'Old password does not match');
            }
        }
        else{
            // Return response back
            return redirect('/admin/login')->with('error', 'Invalid username');
        }


    }


    public function shareLink(Request $req){
        switch ($req->event) {
            case 'blog':
                $url = url('/blogdetail/'.$req->id);
                $title = $req->title;
                break;
            case 'css5':
                $url = url('/careerstaterdetail/'.$req->id);
                $title = $req->title;
                break;

            default:
                $url = url('/');
                $title = "Career Guild - Home";
                break;
        }

        $info = $this->sharethisLink($url, $title);

        $resData = ['title' => 'Good!', 'res' => $info, 'message' => 'success'];

        // Return response
        return $this->returnJSON($resData);

    }



    public function adminlogout(Request $req){


        $admin = Admin::where('username', $req->username)->get();

        if(count($admin) > 0){
            Session::flush();
            return redirect('/admin/login');
        }



    }


    public function returnJSON($data){
        return response()->json($data);
    }

}
