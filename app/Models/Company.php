<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

	protected $fillable = [
		'user_id',
		'company_code',
		'company_name',
		'country_id',
		'state_id',
		'city_id',
		'pincode',
		'address',
		'email_id',
		'phone_no',
		'fax_no',
		'website',
		'registration_type',
		'logo'
	];

	public function add($data) {
		$rs = Company::create($data);
		return $rs;
	}

	public function getAll() {
		$rs = Company::where(['status' => 1])->orderBy('id','desc')->get();
		return $rs;
	}

}
