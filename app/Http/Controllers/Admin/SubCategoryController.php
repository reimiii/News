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
      'sub_category_name' => 'required|unique:sub_categories,sub_category_name',
      'sub_category_order' => 'required|integer',
    ],[
      'category_id.required' => 'Category is required',
      'show_on_menu.required' => 'Show on menu is required',
    ]);

    // ngambil data order dari database validasi ulang

    // $category_id = $request->input('category_id');
    // $sub_category_order = $request->input('sub_category_order');

    // $table = DB::table('sub_categories')
    //     ->select('id')
    //     ->where([['category_id', $category_id],
    //     ['sub_category_order', $sub_category_order]])
    //     ->first();

    // if($table)
    // {
    //   return redirect()->back()->with('error', 'Order already exist');
    // }

    // DB::table('sub_categories')->insert();

    $subcategory = new SubCategory();
    $subcategory->category_id = $request->category_id;
    $subcategory->sub_category_order = $request->sub_category_order;

    $check= SubCategory::where([['category_id', $request->category_id],
    ['sub_category_order', $request->sub_category_order]])->first();

    if($check)
    {
      $category_id = $request->old('category_id');
      $sub_category_order = $request->old('sub_category_order');
      return redirect()->back()->with('error', 'Order already exist in '.$category_id.' category')->withInput();
    }

    $subcategory->sub_category_name = $request->sub_category_name;
    $subcategory->show_on_menu = $request->show_on_menu;
    $subcategory->save();

    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category created successfully');

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
      'sub_category_name' => 'required|unique:sub_categories,sub_category_name,'.$id,
      'sub_category_order' => 'required|integer',
    ],[
      'category_id.required' => 'Category is required',
      'show_on_menu.required' => 'Show on menu is required',
    ]);

    $subcategory = SubCategory::where('id',$id)->first();
    $subcategory->category_id = $request->category_id;
    $subcategory->sub_category_name = $request->sub_category_name;
    $subcategory->show_on_menu = $request->show_on_menu;
    $subcategory->sub_category_order = $request->sub_category_order;
    $subcategory->update();

    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category updated successfully');
  }

  public function delete($id)
  {
    $subcategory = SubCategory::where('id',$id)->first();
    $subcategory->delete();
    return redirect()->route('admin_sub_category_show')->with('success', 'Sub-Category deleted successfully');
  }
}
