<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Campaign;


class CampaignController extends Controller
{
/**
* @SWG\Get(
*     path="/campaign",
*     summary="Get a list of campaign",
*     tags={"Campaign"},
*     @SWG\Response(response=200, description="Successful operation"),
*     @SWG\Response(response=400, description="Invalid request")
* )
*/
    public function index(Request $req){
        $campaign = Campaign::all();
        return  view('welcome')->with("campaign",$campaign);
    }
/**
* @SWG\Get(
*     path="/campaign/add",
*     summary="Add campaign",
*     tags={"Campaign"},
*     @SWG\Response(response=200, description="Successful operation"),
*     @SWG\Response(response=400, description="Invalid request")
* )
*/
    public function add(Request $req){
        $campaign = new Campaign;
        $campaign->description = $req->decription;
        $campaign->budget = $req->budget;
        $campaign->name = $req->name;
        $campaign->start = $req->start;
        $campaign->end = $req->end;
        $campaign->save();
        return redirect()->back();
    }
/**
* @SWG\Get(
*     path="/campaign/delete",
*     summary="Delete campaign",
*     tags={"Campaign"},
*     @SWG\Response(response=200, description="Successful operation"),
*     @SWG\Response(response=400, description="Invalid request")
* )
*/
    public function delete(Request $req){
        $campaign = Campaign::find($req->id);
        $campaign->delete();
        return redirect()->back();
    }
/**
* @SWG\Get(
*     path="/campaign/edit",
*     summary="Edit campaign",
*     tags={"Campaign"},
*     @SWG\Response(response=200, description="Successful operation"),
*     @SWG\Response(response=400, description="Invalid request")
* )
*/
    public function edit(Request $req){
        $campaign = Campaign::find($req->id);
        return view('edit')->with("campaign",$campaign);
    }
/**
* @SWG\Get(
*     path="/campaign/update",
*     summary="Update campaign",
*     tags={"Campaign"},
*     @SWG\Response(response=200, description="Successful operation"),
*     @SWG\Response(response=400, description="Invalid request")
* )
*/
    public function update(Request $req){
        $campaign = Campaign::find($req->id);
        $campaign->update([
            'name' => $req->name,
            'budget' => $req->budget,
            'description' => $req->description,
            'start' => $req->start,
            'end' => $req->end,
        ]);
        return redirect()->back();
    }
}
