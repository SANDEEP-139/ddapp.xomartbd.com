<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function index(Request $request) {
		$categories = Category::orderBy('id', 'DESC')->paginate(5);
		
		return view('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('categories.create');
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
			'icon' => 'required',
			'is_active' => 'required',
		]);

        $icon_name = '';
        if ($request->hasFile('icon')) {

            $path = public_path('category_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $icon = $request->file('icon');

            $icon_name = uniqid() . '_' . trim($icon->getClientOriginalName());

            $icon->move($path, $icon_name);

        }

        $category = new Category();
        $category->title = $request->input('title');
        $category->icon = $icon_name;
        $category->status = $request->input('is_active');
        $category->save();
		

		return redirect()->route('categories.index')
			->with('success', 'Category created successfully');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::find($id);

		return view('categories.edit', compact('category'));
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
			
			'is_active' => 'required',
		]);


        
        if ($request->hasFile('icon')) {

            $path = public_path('category_photos');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $icon = $request->file('icon');

            $icon_name = uniqid() . '_' . trim($icon->getClientOriginalName());

            $icon->move($path, $icon_name);
    
        }else{
            $icon_name = $request->input('hidden_icon');
            
        }
		$category = Category::find($id);
		$category->title = $request->input('title');
        $category->icon = $icon_name;
        $category->status = $request->input('is_active');
		$category->save();
		return redirect()->route('categories.index')
			->with('success', 'Category updated successfully');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Category::where('id', $id)->delete();
		return redirect()->route('categories.index')
			->with('success', 'Category deleted successfully');
	}
}
