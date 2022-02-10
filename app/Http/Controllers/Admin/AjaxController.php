<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
	public function getData(Request $request) {
		$id = $request->input("id");
		$table_name = $request->input("table");
		$filtered_by = $request->input('filtered_by');
		$data = DB::table($table_name)
		            ->select('id','name')
		            ->where($filtered_by,$id)
		            ->get();
		echo json_encode($data);
	}
}
