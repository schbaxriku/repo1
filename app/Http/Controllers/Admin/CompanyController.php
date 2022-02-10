<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Country;

class CompanyController extends Controller
{
	public function index() {
		$company = new Company;
		$companies = $company->getAll();
		return view('admin/company/list',compact('companies'));
	}

	public function add() {
		$country = new Country;
		$countries = $country->getCountryList();
		return view('admin/company/add',compact('countries'));
	}

	public function store(Request $request) {
		$validated = $request->validate([
	        'company_code' => 'required',
	        'company_name' => 'required',
	        'country_id' => 'required',
	        'state_id' => 'required',
	        'city_id' => 'required',
	        'pincode' => 'required',
	        'address' => 'required',
	        'email_id' => 'required',
	        'phone_no' => 'required',
	        'fax_no' => 'required',
	        'website' => 'required',
	        'registration_type' => 'required',
	        'logo' => 'required',
	    ]);

		$company = new Company;
		$data = $request->input();
		$data['user_id'] = 1;
		$fileName = time().'-'.Str::random(10).'.'.$request->logo->extension();
		$file_uploads_rs = $request->logo->move(public_path('assets/custom-assets/image/company'), $fileName);
		if($file_uploads_rs) {
			$data['logo'] = $fileName;
		}
		else {
			$data['logo'] = '';
		}
		$rs = $company->add($data);
		alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
		return redirect()->back();
	}
}
