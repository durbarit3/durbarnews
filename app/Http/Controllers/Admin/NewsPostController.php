<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
     public function __construct(){

	   }
	   // 
	   public function index(){
	   	return view('admin.newspost.index');
	   }

	   // create
	   public function create(){
	   	return view('admin.newspost.create');
	   }
}
