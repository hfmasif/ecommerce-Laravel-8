<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index() {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }


    public function create() {
        return view('admin.brand.create');
    }


    public function store(Request $request) {
        $this->validate($request, [
            'brand_name' => 'required|unique:brands',
            'brand_status' => 'required'
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_status = $request->brand_status;
        if ($brand->save()) {
            return back()->with('success', 'Added Successfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }


    public function edit($id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'brand_name' => 'required',
            'brand_status' => 'required'
        ]);
        $brands = Brand::findOrFail($id);
        $brands->brand_name = $request->brand_name;
        $brands->brand_status = $request->brand_status;
        if ($brands->save()) {
            return back()->with('success', 'Updated Succesfully!');
        } else {
            return back()->with('error', 'Found Error in update!');
        }
    }


    public function destroy($id) {
        $brand = Brand::findOrFail($id);
        if ($brand) {
            $brand->delete();
            return back()->with('success', 'Deleted Succesfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }


    public function inactive($id) {
        $brand = Brand::where('id', $id)->update(['brand_status' => 0]);
        if ($brand) {
            return back()->with('success', 'Inactivate Successfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }


    public function active($id) {
        $brand = Brand::where('id', $id)->update(['brand_status' => 1]);
        if ($brand) {
            return back()->with('success', 'Activate Successfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }

}
