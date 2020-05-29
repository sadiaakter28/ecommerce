<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Districts;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('backend.divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'priority' => 'required|numeric',
        ],
            [
                'name.required' => 'Please Provide a Division Name',
                'priority' => 'Please Provide a Division Priority',
            ]);

        $brand = new Division();
        $brand->name = $request->name;
        $brand->priority = $request->priority;
        $brand->save();
        session()->flash('success', 'Added Successfully!');
        return redirect()->route('admin.divisions');
    }

    public function edit($id)
    {
        $division = Division::find($id);
        if (!is_null($division))
        {
            return view('backend.divisions.edit', compact('division'));
        }
        else
        {
            return redirect()->route('backend.divisions');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'priority' => 'required|numeric',
        ],
            [
                'name.required' => 'Please Provide a Division Name',
                'priority' => 'Please Provide a Division Priority',
            ]);
        $brand = Division::find($id);
        $brand->name = $request->name;
        $brand->priority = $request->priority;
        $brand->save();
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.divisions');
    }

    public function delete($id)
    {
        $division = Division::find($id);
        if (!is_null($division))
        {
            //Delete all the districts for this division
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district){
                $district->delete();
            }
            $division->delete();
        }
        session()->flash('success', 'Division has Deleted Successfully!!');
        return back();
    }
}
