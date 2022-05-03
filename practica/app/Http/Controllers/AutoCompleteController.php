<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AutoCompleteController extends Controller
{
    //
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autocomplete-search');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        
        $res = Product::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();
    
        return response()->json($res);
    } 
}
