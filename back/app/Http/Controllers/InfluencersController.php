<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Influencers;


class InfluencersController extends Controller
{
    //
    public function index(Request $req){
        $influencer = Influencers::all();
        return  view('welcome')->with("influencer",$influencer);
    }
    public function add(Request $req){
        $influencer = new Influencers;
        $influencer->instagram = $req->instagram;
        $influencer->name = $req->name;
        $influencer->fowlers = $req->fowlers;
        $influencer->category = $req->category;
        $influencer->save();
        return redirect()->back();
    }
    public function delete(Request $req){
        $influencer = Influencers::find($req->id);
        $influencer->delete();
        return redirect()->back();
    }
    public function edit(Request $req){
        $influencer = Influencers::find($req->id);
        return view('edit')->with("influencer",$influencer);
    }
    public function update(Request $req){
        $influencer = Influencers::find($req->id);
        $influencer->update([
            'name' => $req->name,
            'instagram' => $req->instagram,
            'category' => $req->category,
            'fowlers' => $req->fowlers
        ]);
        return redirect()->back();
    }
}
