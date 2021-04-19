<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index() {
        $subcategories = Subcategory::all();
        return view('admin.subCategory.index', compact('subcategories'));
    }


    public function create() {
        return view('admin.subCategory.create');
    }


    public function store(Request $request) {
        $this->validate($request, [
            'subcategory_name' => 'required|unique:subcategories',
            'subcategory_status' => 'required'
        ]);
        $subcategories = new Subcategory();
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->sub_status = $request->subcategory_status;
        if ($subcategories->save()) {
            return back()->with('success', 'Succesfully Saved! ');
        } else {
            return back()->with('error', 'Error Found! ');
        }
    }


    public function inactive($id) {
        $subcategory = Subcategory::where('id', $id)->update(['sub_status' => 0]);
        if ($subcategory) {
            return back()->with('success', 'Inactive Succesfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }


    public function active($id) {
        $subcategory = Subcategory::where('id', $id)->update(['sub_status' => 1]);
        if ($subcategory) {
            return back()->with('success', 'Active Succesfully!');
        } else {
            return back()->with('Error Found!');
        }
    }


    public function edit($id) {
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.subCategory.edit', compact('subcategory'));
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'subcategory_name' => 'required',
            'subcategory_status' => 'required'
        ]);
        $subcategories = Subcategory::findOrFail($id);
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->sub_status = $request->subcategory_status;
        if ($subcategories->save()) {
            return back()->with('success', 'Updated Succesfully!');
        } else {
            return back()->with('error', 'Error Found in Update!');
        }
    }


    public function destroy($id) {
        $subcategory = Subcategory::findOrFail($id);
        if ($subcategory) {
            $subcategory->delete();
            return back()->with('success', 'Deleted Successfully!');
        } else {
            return back()->with('error', 'Error Found in Deleting!');
        }
    }


}
