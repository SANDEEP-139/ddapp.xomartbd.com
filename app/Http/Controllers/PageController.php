<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request) {
        $pages = Page::orderBy('id', 'DESC')->paginate(5);
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('pages.create');
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
            'status' => 'required',
            'description' => 'required'
        ]);

        $banner_name = '';
        if ($request->hasFile('banner_photo')) {

            $path = public_path('page_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $banner_photo = $request->file('banner_photo');

            $banner_name = uniqid() . '_' . trim($banner_photo->getClientOriginalName());

            $banner_photo->move($path, $banner_name);

        }

        $page = new Page();
        $page->title = $request->input('title');
        // $page->banner_photo = $banner_name;
        $page->description = $request->input('description');
        $page->status = $request->input('status');
        $page->save();
        

        return redirect()->route('pages.index')
            ->with('success', 'Page created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $page = Page::find($id);

        return view('pages.edit', compact('page'));
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
            'status' => 'required',
            'description' => 'required'
        ]);


        
        /*if ($request->hasFile('banner_photo')) {

            $path = public_path('page_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $banner_photo = $request->file('banner_photo');

            $banner_photo_name = uniqid() . '_' . trim($banner_photo->getClientOriginalName());

            $banner_photo->move($path, $banner_photo_name);
    
        }else{
            $banner_photo_name = $request->input('hidden_banner_photo');
            
        }*/
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->status = $request->input('status');
        $page->save();
        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Page::where('id', $id)->delete();
        return redirect()->route('pages.index')
            ->with('success', 'Page deleted successfully');
    }
}
