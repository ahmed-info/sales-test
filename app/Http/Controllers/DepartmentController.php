<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department = Department::first();
         return view('department.index', compact('department'));
    }

    public function list() {
        $departments = Department::all();
        return view('department.list', compact('departments'));
    }

    public function dashboard(){
        return view('content');
    }

    public function create()  {
        return view('department.create');
    }

    public  function store(Request $request){

        $this->validate($request,[
            'mytitle'=>'required|max:25|min:3|string',
            'myimage'=>'image'
        ]);
        
        $department = new Department();

        $department->title = $request->mytitle;

        $department->save();
        return redirect()->back();
        //dd($request->all());
    }
}
