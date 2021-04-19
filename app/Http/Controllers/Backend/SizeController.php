<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index () {
        $sizes = Size::all();
        return view('admin.size.index', compact('sizes'));
    }


    public function create () {
        return view('admin.size.create');
    }


    public function store (Request $request) {
        $this->validate($request, [
            'size_name' => 'required'
        ]);
        $size = new Size();
        $size->size_name = $request->size_name;
        if ($size->save()) {
            return back()->with('success', 'Added Successfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }


    public function edit ($id) {
        $size = Size::findOrFail($id);
        return view('admin.size.edit', compact('size'));
    }


    public function update (Request $request, $id) {
        $this->validate($request, [
            'size_name' => 'required'
        ]);
        $size = Size::findOrFail($id);
        $size->size_name = $request->size_name;
        if ($size->save()) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('error', 'Error Found in updating!');
        }
    }


    public function destroy ($id) {
        $size = Size::findOrFail($id);
        if ($size) {
            $size->delete();
            return back()->with('success', 'Deleted Succesfully!');
        } else {
            return back()->with('error', 'Error Found!');
        }
    }

}
