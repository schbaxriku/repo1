<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\language;


class LanguageController extends Controller
{
public function index(Request $request){

   	$languages = language::get();
return view('languages.add',['languages'=> $languages]);
    }


 public function add(Request $req){
    $req->validate(
  [
   'name' => 'required',
   'short_name' => 'required',


  	],
  	[
  		'name.required' => 'Required',
  		'short_name.required' => 'Required',

  	]

  );

  $language = language::create([
 
  'name' => $req->name,
  'short_name' => $req->short_name,

  ]);

  if ($language) {
      alert()->success('Added successfull.','Welcome to erp')->autoclose(10000);
    }else
    {
      alert()->error('Sweet Alert with error');
    }
return redirect()->back();
}

 public function edit($id){
   $languages = language::find($id);
 return view('languages.edit',['languages'=>$languages]);
  }

   public function update(Request $req){

   	$req->validate(
  [
   'name' => 'required',
   'short_name' => 'required',
 ],
  	[
  		'name.required' => 'Required',
  		'short_name.required' => 'Required',
]
);
$languages = language::where('id',$req->input('id'))->update([
'name' => $req->input('name'),
'short_name' => $req->input('short_name'),

]);

  if ($languages) {
      alert()->success('Updated successfull.','Welcome to erp')->autoclose(10000);
    }else
    {
      alert()->error('Sweet Alert with error');
    }

  return redirect()->to('admin/languages/');

}

 public function delete($id){

 $languages = language::find($id)->delete();

  if ($languages) {
      alert()->success('Deleted successfull.','Welcome to erp')->autoclose(10000);
    }else
    {
      alert()->error('Sweet Alert with error');
    }
 return redirect()->to('admin/languages/');

}


}
