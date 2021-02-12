<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\SelectorNode;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        
        $data = DB::table('item')
                 ->join('table_transaction','item_id','=','item.id')
                 ->join('table_type','table_type.id','=','item_typeid')
                ->selectRaw('item_image as photo, sum(transaction_quantity) as jumlah_penjualan, type_name as type')
                 ->groupBy('photo','type')
                 ->orderBy('jumlah_penjualan','DESC')
                 ->paginate(4);
                 
        return view('admin.welcome',['gambars'=>$data]);
    }

    public function nonlogintype(Request $request){
        $id = $request->get('id');

        $data = DB::select('select item_name as nama , item_description as description, item_image as photo
                            from  table_type tt join item i 
                            on i.item_typeid = tt.id
                            where type_name = "'.$id.'"');
        
        
        return view('admin.adminhomeonlogin',['gambars'=>$data]);
     
    }

    public function nonlogin(Request $request){

      $cari = $request->get('cari');
        
        $data = DB::select('select item_name as nama , item_description as description, item_image as photo
                            from item
                            where item_name like "%'.$cari.'%"');
    
    
                
        return view('admin.adminhomeonlogin',['gambars'=>$data]);
        
        
    }

    public function detail(Request $request){
        $id = $request->get('id');

        $data = DB::select('select *
                            from  table_type tt join item i 
                            on i.item_typeid = tt.id
                            where item_name = "'.$id.'"');
      
        
    
        
        
        return view('admin.admindetailpage',['gambars'=>$data]);
     
    }

    
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   


