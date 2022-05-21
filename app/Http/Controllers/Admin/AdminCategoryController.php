<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class AdminCategoryController extends Controller
{
  public function show()
  {
    $category = Category::orderBy('category_order', 'asc')->get();
    return view('admin.category.index', compact('category'));
  }

  public function create()
  {
    return view('admin.category.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'category_name' => 'required|unique:categories',
      'category_order' => 'required|unique:categories',
    ]);

    $category = new Category();
    $category->category_name = $request->category_name;
    $category->show_on_menu = $request->show_on_menu;
    $category->category_order = $request->category_order;
    $category->save();

    return redirect()->route('admin_category_show')->with('success', 'Category created successfully');

  }

  public function edit($id)
  {
    $category = Category::where('id',$id)->first();
    return view('admin.category.edit', compact('category'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'category_name' => 'required|unique:categories,category_name,'.$id,
      'category_order' => 'required|unique:categories,category_order,'.$id,
    ]);

    $category = Category::where('id',$id)->first();
    $category->category_name = $request->category_name;
    $category->show_on_menu = $request->show_on_menu;
    $category->category_order = $request->category_order;
    $category->update();

    return redirect()->route('admin_category_show')->with('success', 'Category updated successfully');
  }

  public function delete($id)
  {
    $category = Category::where('id',$id)->first();
    $category->delete();
    return redirect()->route('admin_category_show')->with('success', 'Category deleted successfully');
  }
}
