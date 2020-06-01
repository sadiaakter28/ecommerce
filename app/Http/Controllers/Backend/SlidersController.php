<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Composer\Downloader\FileDownloader;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'image' => 'required|image',
            'priority' => 'required|numeric',
            'button_link' => 'nullable|url',
        ],
            [
                'title.required' => 'Please Provide a Slider title',
                'image.required' => 'Please Provide Slider image',
                'image.image' => 'Please Provide a valid Slider image',
                'priority' => 'Please Provide a Slider Priority',
                'button_link' => 'Please Provide a valid Slider button link',
            ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if($request->image > 0){
            //Insert that Image
            $image = $request->file('image');
            $img = time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/sliders/' .$img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }

        $slider->save();
        session()->flash('success', 'Added Successfully!');
        return redirect()->route('admin.sliders');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:150',
            'image' => 'nullable|image',
            'priority' => 'required|numeric',
            'button_link' => 'nullable|url',
        ],
            [
                'title.required' => 'Please Provide a Slider title',
                'priority.required' => 'Please Provide a Slider Priority',
                'image.image' => 'Please Provide a valid Slider image',
                'button_link.url' => 'Please Provide a valid Slider button link',
            ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if($request->image > 0){
            //Delete the Old Image
            if(File::exists('images/sliders/'.$slider->image)){
                File::exists('images/sliders/'.$slider->image);
            }
            //Insert that Image
            $image = $request->file('image');
            $img = time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/sliders/' .$img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();

        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.sliders');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider))
        {
            //Delete slider image
            if(File::exists('images/sliders/'.$slider->image)){
                File::exists('images/sliders/'.$slider->image);
            }
            $slider->delete();
        }
        session()->flash('success', 'Slider has Deleted Successfully!!');
        return back();
    }
}
