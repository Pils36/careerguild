<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contactus as Contact;

class ContactusController extends Controller
{
    public function contactus(Request $req){

        $contact = Contact::insert(['name' => $req->name, 'email' => $req->email, 'phone_number' => $req->phone_number, 'subject' => $req->subject, 'message' => $req->message]);

        if($contact == true){
            // Return response back
                $this->to = "contact@careerguild.com.ng";
                $this->subject = $req->subject;
                $this->message = "Hello Career Guild.<br><br> My name is ".$req->name.".  I am sending a message relating to the subject above. <br><br> Kindly read through my query <br><hr> ".$req->message." <br><br><br> Send a reply to my email: <a href='mailto:".$req->email."'>".$req->email."</a> or Call <a href='tel:".$req->phone_number."'>".$req->phone_number."</a> <br><br> Thanks";

                $this->file = "";

                $this->sendMail($this->to, $this->subject);

                return redirect()->back()->with('success', 'Message sent successfully');
        }
        else{
            // Return response back
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
