<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index() {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }


    public function create() {
        return view('admin.color.create');
    }


    public function store(Request $request) {
        $this->validate($request, [
            'color_name' => 'required'
        ]);
        $color = new Color();
        $color->color_name = $request->color_name;
        if ($color->save()) {
            return back()->with('success', 'Added Successfully!');
        } else {
            return back()->with('error', 'Something Error Found!');
        }
    }


    public function edit($id) {
        $color = Color::findOrFail($id);
        return view('admin.color.edit', compact('color'));
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'color_name' => 'required'
        ]);
        $color = Color::findOrFail($id);
        $color->color_name = $request->color_name;
        if ($color->save()) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('error', 'Error Found in updating!');
        }
    }


    public function destroy($id) {
        $color = Color::findOrFail($id);
        if ($color) {
            $color->delete();
            return back()->with('success', 'Deleted Succesfully!');
        } else {
            return back()->with('error', 'Found Error in Deleting!');
        }
    }

}
