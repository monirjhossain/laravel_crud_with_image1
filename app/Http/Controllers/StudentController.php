<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('index', [
            'students' => $students
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');

        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $student->photo = $filename;
        }

        $student->save();
        return redirect('/')->with('monir','Student Image Upload Successfully');
    }

    public function edit($id){
        $student = Student::find($id);
        return view('edit',[
            'student'=> $student
        ]);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');

        if($request->hasfile('photo'))
        {
            $destination = 'uploads/students/'. $student->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $student->photo = $filename;
        }
        
        $student->update();
        return redirect('/')->with('success','Student Image Update Successfully');
    }

    public function destroy($id){
        $student = Student::find($id);

        $destination = 'uploads/students'.$student->photo;
        
        if(File::exists($destination)){
            File::delete($destination);
        }

        $student->delete();
        return redirect('/')->with('delete','Student Information deleted Successfully!');
    }
}
