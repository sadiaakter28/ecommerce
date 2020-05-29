<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.categories.index', compact('categories'));
    }
    public function create()
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('backend.categories.create', compact('main_categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:150',
            'description'   => 'required',
            'image'         =>'nullable|image',
        ],
            [
                'name.required'  =>'Please Provide a Category Name',
                'image.image'    =>'Please Provide a valid image with .jpg .png .gif .jpeg extension..',
            ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description=$request->description;
        $category->parent_id = $request->parent_id;
//        dd($category);
//        Insert Image into CategoryImage Model(Only for one image)
        if($request->hasFile('image')){
            //Insert that Image
            $image = $request->file('image');
            $img = time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/categories/' .$img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        session()->flash('success', 'Added Successfully!');
        return redirect()->route('admin.categories');
    }
    public function edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('backend.categories.edit',compact('category', 'main_categories'));
        }
        else{
            return redirect()->route('backend.categories');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'          => 'required|max:150',
            'description'   => 'required',
            'image'         =>'nullable|image',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description=$request->description;
        $category->parent_id = $request->parent_id;

        //Insert Image into CategoryImage Model(Only for one image)
        if($request->hasFile('image')){
            //Delete the old image from folder
            if (\File::exists('images/categories/'.$category->image)){
                \File::delete('images/categories/'.$category->image);
            }
            //Insert that Image
            $image = $request->file('image');
            $img = time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/categories/' .$img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)){
            //If it is primary category, then delete all its sub category
            if ($category->parent_id==NULL){
                //delete sub categories
                $sub_categories = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
                foreach ($sub_categories as $sub){
                    //Delete Category image
                    if (\File::exists('images/categories/'.$category->image)){
                        \File::delete('images/categories/'.$category->image);
                    }
                    $sub->delete();
                }
            }
            //Delete Category image
            if (\File::exists('images/categories/'.$category->image)){
                \File::delete('images/categories/'.$category->image);
            }
            $category->delete();
        }
        session()->flash('success', 'Category has Deleted Successfully!!');
        return back();
    }
}
