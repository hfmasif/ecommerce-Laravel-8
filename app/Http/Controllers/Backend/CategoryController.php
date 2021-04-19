<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index() {

//        Fetch data from category table
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
//        return view('admin.category.index');
    }

    public function create() {
        return view('admin.category.create');
    }


    public function store(Request $request) {
//        dd($request->all());

//        Validation
        $this->validate($request, [
            'category_name' => 'required|unique:categories',
            'category_status' => 'required'
        ]);

//        Object Create For saving data
        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->status = $request->category_status;


//        $categories->save();            // evabe likhlei data save hoy
//        return back()->with('success', 'Category Successfully Saved');

        if ($categories->save()) {              // eta aro specific way te likha logic soho
            return back()->with('success', 'Category Successfully Saved.');
        } else {
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }


    public function edit($id) {

//        Eloquent ORM
        $category = Category::findOrFail($id);
//        $category = Category::find($id);
//        $category = Category::where('id', '=', '$id')->first();
//        $category = Category::where('id', '$id')->first();


//        Query Builder
//        $category = DB::table('categories')->where('id', $id)->first();
//        $category = DB::table('categories')->where('id', '=', $id)->first();
//        $category = DB::table('categories')->find($id);
//        dd($category);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'category_name' => 'required',
            'category_status' => 'required'
        ]);

        $categories = Category::findOrFail($id);
        $categories->category_name = $request->category_name;
        $categories->status = $request->category_status;

        if ($categories->save()) {
            return back()->with('success', 'Category Succesfully Updated');
        } else {
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }

    }


    public function destroy($id) {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
            return back()->with('success', 'Category Deleted Succesfully');
        } else {
            return back()->with('error', 'Something Error Found, try again.');
        }
    }


    public function active($id) {
        $category = Category::where('id', $id)->update(['status' => 1]);
        if ($category) {
            return back()->with('success', 'Category Activated.');
        } else {
            return back()->with('error', 'Something Error Found.');
        }
    }


    public function inactive($id) {
        $category = Category::where('id', $id)->update(['status' => 0]);
        if ($category) {
            return back()->with('success', 'Deactivated Succesfully.');
        } else {
            return back()->with('error', 'Something Error Found.');
        }
    }



}
