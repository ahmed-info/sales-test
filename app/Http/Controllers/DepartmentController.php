<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    public function index(){
         return view('content');
    }
    public function sublist($id){
        $department = Department::find($id);
        // foreach($department->subdepartments as $supdepat){
        //     echo $supdepat;
           
        // }
        //  return "";

        return view('subdepart.list', compact('department'));
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
        if($request->file('image')){
            $dest = 'images/'. $department->image;
            if(File::exists($dest)){
                File::delete($dest);
            }
            $image = $request->file('image');
            $filename = time() .'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-', $filename);
            //move to folder
            $image->move('images/department',$filename);
            $department->image = 'department'.'/'. $filename;
        }
        $department->update();
        return back()->with('status','تم تعديل القسم');
    }
    public function destroy($id){
        $department = Department::find($id);
        $dest = 'images/' .$department->image;
         if(File::exists($dest)){
                File::delete($dest);
            }

            $department->delete();
            return back()->with('status','تم الحذف بنجاح');
    }
}
