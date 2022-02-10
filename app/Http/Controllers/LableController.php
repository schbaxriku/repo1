<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\language;
use App\Models\label_setting;

class LableController extends Controller
{
   public function index(){
$languages = language::get();
$label_setting = label_setting::get();

return view('lables.lable',['languages'=> $languages, 'label_setting'=>$label_setting]);
   }

   public function store(Request $req){
    $req->validate(
  [
   'language_id' => 'required',
   'label_name' => 'required',
   'label_value' => 'required',


  	],
  	[
  		'language_id.required' => 'Required',
  		'label_name.required' => 'Required',
        'label_value.required' => 'Required',
  	]

  );

  $language = label_setting::create([
  'language_id' => $req->language_id,
  'label_name' => $req->label_name,
  'label_value' => $req->label_value,
 ]);

 if ($language) {
      alert()->success('Added successfull.','Welcome to erp')->autoclose(10000);
    }else{
      alert()->error('Sweet Alert with error');
    }
return redirect()->back();

   }

    public function edit($id){
   $label_setting = label_setting::where('id', $id)->first();
   $languages = language::get();

 return view('lables.edit',['label_setting'=>$label_setting, 'languages'=> $languages]);
  }

   public function update(Request $req){

   $req->validate(
  [
   'language_id' => 'required',
   'label_name' => 'required',
   'label_value' => 'required',


  	],
  	[
  		'language_id.required' => 'Required',
  		'label_name.required' => 'Required',
        'label_value.required' => 'Required',
  	]

  );

  $languages = label_setting::where('id',$req->input('id'))->update([

    'language_id' => $req->input('language_id'),
    'label_name' => $req->input('label_name'),
    'label_value' => $req->input('label_value'),

]);
 
if ($languages) {
      alert()->success('Updated successfull.','Welcome to erp')->autoclose(10000);
    }else{
      alert()->error('Sweet Alert with error');
    }
return redirect()->to('admin/lables/');

}

 public function delete($id){

 $label_setting = label_setting::find($id)->delete();
if ($label_setting) {
      alert()->success('Deleted successfull.','Welcome to erp')->autoclose(10000);
    }else{
      alert()->error('Sweet Alert with error');
    }
 return redirect()->to('admin/lables/');

}
}
