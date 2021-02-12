<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\SelectorNode;

class HomeController extends Controller
{


    public function index()
    {
        
        $data = DB::table('item')
                 ->join('table_transaction','item_id','=','item.id')
                 ->join('table_type','table_type.id','=','item_typeid')
                ->selectRaw('item_image as photo, sum(transaction_quantity) as jumlah_penjualan, type_name as type')
                 ->groupBy('photo','type')
                 ->orderBy('jumlah_penjualan','DESC')
                 ->paginate(4);
                 
        return view('welcome',['gambars'=>$data]);
    }

    public function nonlogintype(Request $request){
        $id = $request->get('id');

        $data = DB::select('select item_name as nama , item_description as description, item_image as photo
                            from  table_type tt join item i 
                            on i.item_typeid = tt.id
                            where type_name = "'.$id.'"');
        
        
        return view('homepagenonlogin',['gambars'=>$data]);
     
    }

    public function nonlogin(Request $request){

      $cari = $request->get('cari');
        
        $data = DB::select('select item_name as nama , item_description as description, item_image as photo
                            from item
                            where item_name like "%'.$cari.'%"');
    
    
                
        return view('homepagenonlogin',['gambars'=>$data]);
        
        
    }
    public function detail(Request $request){
        $id = $request->get('id');

        $data = DB::select('select *
                            from  table_type tt join item i 
                            on i.item_typeid = tt.id
                            where item_name = "'.$id.'"');
                            
        
        return view('detail',['gambars'=>$data]);
        
     
    }

    // public function edit(Request $request){
    //     $id = $request->get('id');
        
    //     $data = DB::select('select *
    //                         from  table_type tt join item i 
    //                         on i.item_typeid = tt.id 
    //                         where item_name = "'.$id.'"');

    //     dd($data);

    //     return view('update',['gambars' =>$data]);
        
    // }

    public function history(){
        $id = Auth::user()->id;
        $data = DB::select('select tt.transaction_date as tanggal, transaction_quantity as qty,
                                item_price as harga, item_name as nama, item_price*transaction_quantity as subtotal, total.total AS total
                                from table_transaction tt join item i
                                on tt.item_id = i.id join (select transaction_date, sum(item_price*transaction_quantity) as total
                                from table_transaction tt join item i
                                on tt.item_id = i.id
                                group by transaction_date) as total
                                on total.transaction_date = tt.transaction_date 
                                where user_id ="'.$id.'" ');

        
                                                      

        return view('history',['gambars'=>$data]);
    }

    public function checkout(){

$cart = DB::select('select *
                    from cart c join item i 
                    on i.item_name = c.name');
        

for($i = 0; $i<count($cart); $i++){
        DB::table('table_transaction')->insert([
            'item_id' => $cart[$i]->id,
            'transaction_quantity' => $cart[$i]->qty,
            'transaction_date' => now(),
            'user_id' => auth::user()->id
                        ]);
            
        }

        $id = Auth::user()->id;
        
        $data = DB::select('select tt.transaction_date as tanggal, transaction_quantity as qty,
                                item_price as harga, item_name as nama, item_price*transaction_quantity as subtotal, total.total AS total
                                from table_transaction tt join item i
                                on tt.item_id = i.id join (select transaction_date, sum(item_price*transaction_quantity) as total
                                from table_transaction tt join item i
                                on tt.item_id = i.id
                                group by transaction_date) as total
                                on total.transaction_date = tt.transaction_date 
                                where user_id ="'.$id.'" ');
        
        
        DB::delete('delete 
                    from cart');
                                                      

        return view('history',['gambars'=>$data]);

    }


    public function addcart(Request $request){

        
        $id = $request ->get('barang_id');

        $data = DB::select('select item_name as nama, item_price as harga
                            from item
                            where id = '.$id.'');
        
        
        for($i = 0; $i < count($data); $i++){
            
        $cart = DB::select('select *
                from cart 
                where name = "'.$data[$i]->nama.'"');

        
        
        if(!$cart) {
              DB::table('cart')->insert([
                'name' => $data[$i]->nama,
                'price' => $data[$i]->harga,
                'qty' => $request->quantity,
                'user_id' => auth::user()->id
                            ]);
                
                        }
        else{
                
      DB::update('update cart 
                 set qty = '.$request->quantity.'
                 where name = "'.$data[$i]->nama.'"');

            }
         
         }
            
        
        
            $cart = DB::select('select *
            from cart');

            
        return view('cart',['gambars'=>$cart]);
    }
    

    public function cart(){

        $cart = DB::select('select *
                            from cart');
        
        
        return view('cart',['gambars'=>$cart]);
    }

    public function delete(Request $request){
        $id = $request->get('id');

        DB::delete('delete 
                    from cart
                    where id ='.$id.'');

        $cart = DB::select('select *
        from cart');

        

        return view('cart',['gambars'=>$cart]);
    }

}

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   


