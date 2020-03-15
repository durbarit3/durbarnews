<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $divisions = Division::select(['name_bn', 'name_en'])->get();
        return view('admin.division.divisions.index', compact('divisions'));
    }
}
