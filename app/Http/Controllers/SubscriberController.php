<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Redirector;

use JD\Cloudder\Facades\Cloudder;

use Session;

use App\Admin as Admin;

use App\Subscriber as Subscriber;

class SubscriberController extends Controller
{
    public function subscribe(Request $req){
        // Check
        $check = Subscriber::where('email', $req->email)->get();

        if(count($check) > 0){
            // Return response back
            return redirect()->back()->with('error', 'You have already subscribed!');
        }
        else{

            $subscribe = Subscriber::insert(['email' => $req->email]);

            if($subscribe == true){
                // Return response back
                $this->subject = 'Newsletter Subscription';
                $this->message = "Thank you for subscribing to our newsletter. <br><br> Career Guild Support";
                $this->file = "";

                $this->sendMail($req->email, $this->subject);

                return redirect()->back()->with('success', 'Thank you for subscribing');
            }
            else{
                // Return response back
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }


    }


    public function unsubscribe(Request $req){

        $check = Subscriber::where('id', $req->id)->get();

        if(count($check) > 0){
            $check[0]->status;

            if($check[0]->status == 1){
                $status = 0;
            }
            else{
                $status = 1;
            }

            Subscriber::where('id', $req->id)->update(['status' => $status]);

            return redirect()->back()->with('success', 'Sucess!!!');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function sendsubscribtion(Request $req, Subscriber $subscriber){
        if($req->email == "all"){
            // Send mail to all
            $sendto = $subscriber->where('status', 1)->get();
            foreach($sendto as $key => $value){
                $this->to = $value->email;
                $this->subject = $req->subject;
                $this->message = $req->editor1;

                $this->file = "";

                $this->sendMail($this->to, $this->subject);
            }

            return redirect()->back()->with('success', 'Mail Sent!');
        }
        else{
            // Loop through
            if(count($req->email) > 0){
                foreach($req->email as $key => $value){

                    if($value != "all"){
                        $this->to = $value;
                        $this->subject = $req->subject;
                        $this->message = $req->editor1;

                        $this->file = "";

                        $this->sendMail($this->to, $this->subject);
                    }
                }
            }

            return redirect()->back()->with('success', 'Mail Sent!');
        }
    }
}
