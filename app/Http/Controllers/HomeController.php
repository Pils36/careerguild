<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Share;

class HomeController extends Controller
{
    public function index(){

        $this->expiredEvent();

        $data = array([
            'teamdata' => $this->getfrontTeam(),
            'blogdata' => $this->getallBloghome(),
            'trainingdata' => $this->getfrontEvent(),
        ]);


        return view('pages.index')->with(['data' => $data]);
    }

    public function allTeams(){

        $data = array([
            'teamdata' => $this->getallTeam()
        ]);


        return view('pages.ourteam')->with(['data' => $data]);
    }

    public function allblogs(){

        $data = array([
            'blogdata' => $this->getallBlogdata()
        ]);


        return view('pages.blog')->with(['data' => $data]);
    }


    public function allcareerstaters(){

        $data = array([
            'css5data' => $this->getallCss5data()
        ]);


        return view('pages.css5')->with(['data' => $data]);
    }

    public function blogdetail(Request $req, $id){

        $data = array([
            'blogdetails' => $this->myblogDetail($id),
            'blogcomment' => $this->myblogcomment($id),
            'recentblog' => $this->getallBloghome()
        ]);

        return view('pages.blogdetail')->with(['data' => $data]);
    }


    public function careerstaterdetail(Request $req, $id){

        $data = array([
            'blogdetails' => $this->mycss5Detail($id),
            'blogcomment' => $this->mycss5comment($id),
            'recentblog' => $this->getallBloghome()
        ]);

        return view('pages.css5detail')->with(['data' => $data]);
    }


    public function training(Request $req){

        $data = $this->getfrontEvent();

        return view('pages.training')->with(['data' => $data]);
    }
}
