<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
         return view('content');
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
            'image'=>'image'
        ]);
        try{
        $department = new Department();

        $department->title = $request->mytitle;

        //image
        if($request->file('image')){
        $image = $request->file('image');
        $filename = time().'_'. $image->getClientOriginalName();
        $filename = str_replace(' ','-',$filename);
        $image->move("images/department",$filename);
        $department->image = 'department'.'/'.$filename;
        }
        $department->save();
        //with يعني السيشن
        return back()->with('status','تمت الاضافة بنجاح');
        }catch(\Exception $ex){
            
            return back()->with('error','خطأ في النظام لم تتم الاضافة');

        }

        //dd($request->all());
    }

    public function edit(Department $department){
        return view('department.edit', compact('department'));

    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'mytitle'=>'required|max:25|min:3|string',
            'image'=>'image'
        ]);

        $department = Department::find($id);

        $department->title = $request->mytitle;
        $department->update();
        return back()->with('status','تم تعديل القسم');
    }
}
