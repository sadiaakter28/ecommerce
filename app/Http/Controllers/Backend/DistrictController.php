<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.districts.index', compact('districts'));
    }

    public function create()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.districts.create',compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'division_id' => 'required|numeric',
        ],
            [
                'name.required' => 'Please Provide a District Name',
                'division_id' => 'Please Provide a District Priority',
            ]);

        $brand = new District();
        $brand->name = $request->name;
        $brand->division_id = $request->division_id;
        $brand->save();
        session()->flash('success', 'Added Successfully!');
        return redirect()->route('admin.districts');
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::find($id);
        if (!is_null($district))
        {
            return view('backend.districts.edit', compact('district','divisions'));
        }
        else
        {
            return redirect()->route('backend.districts');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'division_id' => 'required|numeric',
        ],
            [
                'name.required' => 'Please Provide a District Name',
                'division_id' => 'Please Provide a District Priority',
            ]);
        $brand = District::find($id);
        $brand->name = $request->name;
        $brand->division_id = $request->division_id;
        $brand->save();
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.districts');
    }

    public function delete($id)
    {
        $district = District::find($id);
        if (!is_null($district))
        {
            $district->delete();
        }
        session()->flash('success', 'District has Deleted Successfully!!');
        return back();
    }
}
