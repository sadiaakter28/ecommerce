<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;
use File;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please Provide a Brand Name',
                'image.image' => 'Please Provide a valid image with .jpg .png .gif .jpeg extension..',
            ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        // Insert Image into BrandImage Model(Only for one image)
        if ($request->hasFile('image')) {
            //Insert that Image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();
        session()->flash('success', 'Added Successfully!');
        return redirect()->route('admin.brands');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand))
        {
            return view('backend.brands.edit', compact('brand'));
        }
        else
            {
            return redirect()->route('backend.brands');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        //Insert Image into BrandImage Model(Only for one image)
        if ($request->hasFile('image')) {
            //Delete the old image from folder
            if (File::exists('images/brands/' . $brand->image))
            {
                File::delete('images/brands/' . $brand->image);
            }
            //Insert that Image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.brands');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand))
        {
            //Delete Brand image
            if (File::exists('images/brands/' . $brand->image))
            {
                File::delete('images/brands/' . $brand->image);
            }
            $brand->delete();
        }
        session()->flash('success', 'Brand has Deleted Successfully!!');
        return back();
    }
}
