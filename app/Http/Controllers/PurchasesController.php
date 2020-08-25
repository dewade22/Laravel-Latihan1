<?php

namespace App\Http\Controllers;
use App\PurchasesHeader;
use App\PurchasesLine;
use DataTables;
use Illuminate\Http\Request;
use DB;

class PurchasesController extends Controller
{

    /**
     * Function untuk mendapatkan data berupa JSON File
     */

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataPurchase = DB::table('PurchasesHeader AS PH')
        ->select(['PH.PurchaseHeaderID','PH.No', 'PH.PaytoName','PH.PaytoAddress','PL.PostingGroup'])
        ->join('PurchasesLine AS PL', 'PH.PurchaseHeaderID','=','PL.PurchaseHeaderID');
        
        
        //dd($dataPurchase);
        //return view('pages.purchase.index', compact('dataPurchase'));
         if($request->ajax()){
             return DataTables::of($dataPurchase)
                ->make();
         }        
        return view('pages.purchase.index');
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
