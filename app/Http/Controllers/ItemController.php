<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
class ItemController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        
        
        $items = DB::table('item') -> get();
        
        return view('admin.items', ['item' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table_types = DB::table('table_type')-> get();
       return view ('admin.additem', ['table_type' => $table_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $this -> validate($request, [
        'name' => 'required|min:5',
        'typeid' => 'required',
        'stock' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:5001',
        'description' => 'required|min:10',
        'image' => 'required',
    ]);

    DB::table('item') -> insert([
        'item_name' => $request -> name,
        'item_typeid' => $request -> typeid,
        'item_stock' => $request -> stock,
        'item_price' => $request -> price,
        'item_description' => $request -> description,
        'item_image' => $request -> image,

      
    ]);

//     $itemadd = new Item();
//     $itemadd->item_name = $request->input('name');
//     $itemadd->item_typeid = $request->input('typeid');
//     $itemadd->item_stock = $request->input('stock');
//     $itemadd->item_price = $request->input('price');
//     $itemadd->item_description = $request->input('description');
//    if($request->hasfile('image')){
//        $file = $request->file('image');
//        $extension = $file->getClientOriginalExtension();
//        $filename = time() . '.' . $extension;
//        $file->move('public/images', $filename);
//        $itemadd->item_image = $filename;
//    }else{
//        return $request;
//        $itemadd->image = '';
//    }
//    $itemadd->save();
// return redirect('/adminhomeonlogin')->with('item', $itemadd);

    return redirect('/adminhomeonlogin');
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
        
        $items = DB::table('item')->where('id',$id)->first();

        return view('admin.edititem', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required|min:5',
            'stock' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:5001',
            'description' => 'required'
        ]);

        DB::table('item') -> where('id', $request->id) -> update([
            'item_name' => $request->name,
            'item_stock' => $request->stock,
            'item_price' => $request->price,
            'item_description' => $request->description,
        ]);
        
        return redirect('/adminhomeonlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    DB::table('item') -> where('id', $id) -> delete();
    return redirect('/adminhomeonlogin');
    }
}
