<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CampaignController extends Controller
{
    public function index(Request $request) {
        $campaigns = Campaign::orderBy('id', 'DESC')->paginate(5);
        
        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = User::orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        return view('campaigns.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'campaign_type' => 'required',
            'campaign_start_date' => 'required',
            'campaign_end_date' => 'required',
            'banner_photo' => 'required',
            'status' => 'required',
            'campaign_description' => 'required'
        ]);

        $banner_name = '';
        if ($request->hasFile('banner_photo')) {

            $path = public_path('campaign_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $banner_photo = $request->file('banner_photo');

            $banner_name = uniqid() . '_' . trim($banner_photo->getClientOriginalName());

            $banner_photo->move($path, $banner_name);

        }

        $join_users = implode(',', $request->input('join_users'));

        $campaign = new Campaign();
        $campaign->title = $request->input('title');
        $campaign->banner_photo = $banner_name;
        $campaign->campaign_type = $request->input('campaign_type');
        $campaign->campaign_start_date = $request->input('campaign_start_date');
        $campaign->campaign_end_date = $request->input('campaign_end_date');
        $campaign->campaign_description = $request->input('campaign_description');
        $campaign->joined_users = $join_users;
        $campaign->status = $request->input('status');
        $campaign->save();
        

        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $users = User::orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        $campaign = Campaign::find($id);

        return view('campaigns.edit', compact('campaign','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'campaign_type' => 'required',
            'campaign_start_date' => 'required',
            'campaign_end_date' => 'required',
            'status' => 'required',
            'campaign_description' => 'required'
        ]);


        
        if ($request->hasFile('banner_photo')) {

            $path = public_path('campaign_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $banner_photo = $request->file('banner_photo');

            $banner_photo_name = uniqid() . '_' . trim($banner_photo->getClientOriginalName());

            $banner_photo->move($path, $banner_photo_name);
    
        }else{
            $banner_photo_name = $request->input('hidden_banner_photo');
            
        }

        $join_users = implode(',', $request->input('join_users'));
        
        $campaign = Campaign::find($id);
        $campaign->title = $request->input('title');
        $campaign->banner_photo = $banner_photo_name;
        $campaign->campaign_type = $request->input('campaign_type');
        $campaign->campaign_start_date = $request->input('campaign_start_date');
        $campaign->campaign_end_date = $request->input('campaign_end_date');
        $campaign->campaign_description = $request->input('campaign_description');
        $campaign->joined_users = $join_users;
        $campaign->status = $request->input('status');
        $campaign->save();
        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Campaign::where('id', $id)->delete();
        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign deleted successfully');
    }
}
