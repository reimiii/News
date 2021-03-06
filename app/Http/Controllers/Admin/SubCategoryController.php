<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;



class SubCategoryController extends Controller
{
  public function show()
  {
    $subcategory = SubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->get();
    return view('admin.subcategory.index', compact('subcategory'));
  }

  public function create()
  {
    $category = Category::orderBy('category_order', 'asc')->get();
    return view('admin.subcategory.create', compact('category'));
  }

  public function store(Request $request)
  {

    $request->validate([
      'category_id' => 'required',
      'show_on_menu' => 'required',
      'show_on_home' => 'required',
      'sub_category_name' => 'required',
      'sub_category_order' => 'required|integer',
    ],[
      'category_id.required' => 'Category is required',
      'show_on_menu.required' => 'Show on menu is required',
    ]);



    $subcategory = new SubCategory();
    $subcategory->category_id = $request->category_id;
    $subcategory->sub_category_order = $request->sub_category_order;
    $subcategory->sub_category_name = $request->sub_category_name;

    $check = SubCategory::where([
      ['category_id', $request->category_id],
      ['sub_category_order', $request->sub_category_order],
    ])->first();

    $check_name = SubCategory::where([
      ['category_id', $request->category_id],
      ['sub_category_name', $request->sub_category_name],
      // ['id', '!=', $id],
    ])->first();

    if($check)
    {
      $category_id = $request->old('category_id');
      $sub_category_order = $request->old('sub_category_order');
      return redirect()->back()
        ->with('error', 'Sub-Category Order '.$request->sub_category_order.' already exist in Category Name')->withInput();

    } elseif ($check_name) {
      $sub_category_name = $request->old('sub_category_name');
      return redirect()->back()
        ->with('error', 'Sub-Category *'.$request->sub_category_name.'* already exist in Category Name ' )->withInput();
    }


    $subcategory->show_on_menu = $request->show_on_menu;
    $subcategory->show_on_home = $request->show_on_home;
    $subcategory->save();

    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category '.$request->sub_category_name. ' created successfully');

  }

  public function edit($id)
  {
    $subcategory = SubCategory::where('id', $id)->first();
    $category = Category::orderBy('category_order', 'asc')->get();

    return view('admin.subcategory.edit', compact('subcategory', 'category'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'category_id' => 'required',
      'show_on_menu' => 'required',
      'show_on_home' => 'required',
      'sub_category_name' => 'required',
      'sub_category_order' => 'required|integer',
    ],[
      'category_id.required' => 'Category is required',
      'show_on_menu.required' => 'Show on menu is required',
    ]);

    $subcategory = SubCategory::where('id',$id)->first();
    $subcategory->category_id = $request->category_id;
    $subcategory->sub_category_name = $request->sub_category_name;
    $subcategory->sub_category_order = $request->sub_category_order;

    $check_name = SubCategory::where([
      ['category_id', $request->category_id],
      ['sub_category_name', $request->sub_category_name],
      ['id', '!=', $id],
    ])->first();

    $check = SubCategory::where([
      ['category_id', $request->category_id],
      ['sub_category_order', $request->sub_category_order],
      ['id', '!=', $id],
    ])->first();

    if($check_name)
    {

      return redirect()->back()->with('error', 'Sub-Category *'.$request->sub_category_name.'* already exist in Category Order ' .$request->category_id )->withInput();

    } elseif ($check) {

      return redirect()->back()
        ->with('error', 'Sub-Category Order '.$request->sub_category_order.' already exist in Category Name')
        ->withInput();
    }

    $subcategory->show_on_menu = $request->show_on_menu;
    $subcategory->show_on_home = $request->show_on_home;
    $subcategory->update();

    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category '.$request->sub_category_name.' updated successfully');
  }

  public function delete($id)
  {
    $subcategory = SubCategory::where('id',$id)->first();
    $subcategory->delete();
    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category '.$subcategory->sub_category_name.' deleted successfully');
  }
}
