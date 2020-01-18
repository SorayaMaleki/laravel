<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    public function register(Request $request){
        if ($request->has('add')){
            $rules=[
                'name'=>'required|max:255',
                'birthday'=>'required|max:200',
                'major'=>'required',
                'resume'=>'required|max:1000000|mimes:jpeg,png,bmp,gif,svg,jpg,png,doc,docx,pdf,application',
                'captcha'=>'required|captcha',
            ];
            $attribute=[
                'name'=>'نام',
                'birthday'=>'تاریخ تولد',
                'major'=>'مدرک تحصیلی',
                'resume'=>'رزومه',
                'captcha'=>'عبارت امنیتی',
            ];
            $CustomMessage=[
                'required' =>'وارد کردن :attribute الزامی است',
                'max' =>':attribute طولانی است',
                'date_format' =>'لطفا :attribute صحیح انتخاب نمایید',
                'captcha'=>':attribute صحیح نیست ',
            ];
            $this->validate($request,$rules,$CustomMessage,$attribute);
            $person=new Form();
            $person->name=$request->name;
            $person->birthday=$request->birthday;
            $person->major=$request->major;

            if ($request->hasFile('resume')){
                $image=$request->resume;
                $name=$image->getClientOriginalName();
                // $size=$image->getClientSize();
                // $ext=$image->getClientOriginalExtension();
                $destenitionPath=public_path('/images/resume');
                $person->resume_name=$name;
                $image->move($destenitionPath,$name);
                $person->save();
            }
            return redirect()->back()->with('message','ثبت نام با موفقیت انجام شد.');
        }
    }
}
