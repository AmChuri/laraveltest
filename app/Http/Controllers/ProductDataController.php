<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productdata;
use View;

class ProductDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$data = productdata::orderBy('created_at','asc')->get();
return view('welcome')->with('data',$data);
        // return view('welcome');
    }


        //ajax form to load the data
    public function ajaxform(Request $request)
    {
        $data = $request->all();
        $totalvalue = (int)$data['quantity'] * (int)$data['price'];
        productdata::create([
            'productname'=>$data['name'],
            'quantity'=>$data['quantity'],
            'price'=>$data['price'],
            'totalvaluenumber'=>$totalvalue
        ]);
        $newdata = productdata::orderBy('created_at','desc')->first();
        // dd($newdata);
        return array(true,$data['name'],$data['quantity'],$data['price'], date('Y-m-d H:i:s'),$totalvalue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
