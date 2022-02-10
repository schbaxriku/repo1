<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration_detail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{

 public function index(){
 $registration = registration_detail::all();
 return view('registration.registration',['registration'=>$registration]);
}

 public function store(Request $req)
{
$req->validate([
'registration_type' => 'required',
'registration_no' => 'required',
'effective_date' => 'required',
'certificate_image' => 'required',
],
[
'registration_type.required' => 'required',
'registration_no.required' => 'required',
'effective_date.required' => 'required',
'certificate_image.required' => 'required',

]
 );

 	 $orgDate = $req->input('effective_date');  
    $newDate = date("Y-m-d", strtotime($orgDate));  
  // echo  "New date format is: ".$newDate. " (MM-DD-YYYY)";
$registration = new registration_detail;
$registration->registration_type = $req->input('registration_type');
$registration->registration_no = $req->input('registration_no');
$registration->effective_date = $newDate;
$registration->user_id = 1;
if ($req->hasfile('certificate_image')) {
    		$file = $req->file('certificate_image');
    		$extension = $file->extension();
    		$filename = time()."-".Str::random(10).'.'.$extension;
    		$file->move('public/assets/custom-assets/image/registration/',$filename);
    		$registration->certificate_image = $filename;
    	}
    	$registration->save();

if ($registration) {
      alert()->success('Added successfull.','Welcome to erp')->autoclose(10000);
    }else{
      alert()->error('Sweet Alert with error');
    }    	
return redirect()->to('admin/registration/');

 }

 public function edit($id){
 $registration = registration_detail::find($id);
 return view('registration.edit',['registration'=>$registration]);
 }

 public function update(Request $req, $id){

$req->validate([
'registration_type' => 'required',
'registration_no' => 'required',
'effective_date' => 'required',
'certificate_image' => 'required',
],
[
'registration_type.required' => 'required',
'registration_no.required' => 'required',
'effective_date.required' => 'required',
'certificate_image.required' => 'required',

]
 );

 $orgDate = $req->input('effective_date');  
    $newDate = date("Y-m-d", strtotime($orgDate));  
    //echo "New date format is: ".$newDate. " (MM-DD-YYYY)";

$registration = registration_detail::find($id);
$registration->registration_type = $req->input('registration_type');
$registration->registration_no = $req->input('registration_no');
$registration->effective_date = $newDate;
$registration->user_id = 1;
if ($req->hasfile('certificate_image')) 
{
    		$file = $req->file('certificate_image');
    		$extension = $file->extension();
    		$filename = time()."-".Str::random(10).'.'.$extension;
    		$file->move('public/assets/custom-assets/image/registration/',$filename);
    		$registration->certificate_image = $filename;
    	}
    	$registration->update();
 if ($registration) {
      alert()->success('updated successfull.','Welcome to erp')->autoclose(10000);
    }else{
      alert()->error('Sweet Alert with error');
    }
    	return redirect()->to('admin/registration/');

 }

public function delete($id){
	$registration = registration_detail::find($id)->delete();
if ($registration) {
      alert()->success('Deleted successfull.','Welcome to erp')->autoclose(10000);
}else{
      alert()->error('Sweet Alert with error');
    }
	return redirect()->to('admin/registration/');
}

}
