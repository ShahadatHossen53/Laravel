<?php

namespace App\Http\Controllers;
use App\Models\Subcategory;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::all();
        return view('admin.subcategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
         $subcategory = new Subcategory();
         $subcategory->category_id = $request->category_id;
         $subcategory->subcategory_name = $request->subcategory_name;
         $subcategory->subcategory_slug = Str::slug($request->subcategory_name, '-');
         $subcategory->save();

         $notification = array('message'=>'Successfuly added a subcategory!', 'alert-type'=>'success');
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subcategory::find($id);
        $category = category::all();
        return view('admin.subcategory.edit', compact(['data', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required'
        ]);
         $subcategory = Subcategory::find($id);
         $subcategory->category_id = $request->category_id;
         $subcategory->subcategory_name = $request->subcategory_name;
         $subcategory->subcategory_slug = Str::slug($request->subcategory_name, '-');
         $subcategory->update();

         $notification = array('message'=>'Successfuly updated!', 'alert-type'=>'success');
         return redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::destroy($id);
        $notification = array('message'=>'Successfully Deleted', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        $notification = array('message'=>'Successfully Deleted', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
