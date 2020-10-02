<?php

namespace App\Http\Controllers;
use App\Model\ItemLedgerEntry;
use App\Model\Items;
use DataTables;
use Illuminate\Http\Request;
use DB;

class ItemLedgerEntryController extends Controller
{
    public function Index(Request $request)
    {
        $dataMatAlkohol = DB::table('ItemLedgerEntry AS ILE')
        ->join('Items AS I','ILE.ItemNo','=','I.ItemNo')
        ->select(['I.ItemNo','ILE.Description', DB::raw('sum(quantity) as qty')])
        ->where('I.InventoryPostingGroup','=','MatAlkohol')     
        ->groupBy('I.ItemNo','ILE.Description');
        
        
        if($request->ajax()){
            return DataTables::of($dataMatAlkohol)
               ->addIndexColumn()
               ->make(true);
        }  
            
       return view('pages.Dashboard.index');
    }
}
