<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\sysuser;

class HomeController extends Controller
{
	
	 public function index(Request $request)
	 {
		 $categories = sysmenu::where('sysmenu_id','=','1')
		 ->with('childrenCategories')
		 ->get();
		 return view('layout.app',['data_menu'=>$categories]);
	 }
	}