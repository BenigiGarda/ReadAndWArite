<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends AdminController
{


    public function index(){
        $data = DB::table('table_type') -> get();
        
        return view('admin.typelist',['data'=>$data]);
    }


    public function store(Request $request){
        
    
        DB::table('table_type')->insert([
            'type_image' => $request->file,
            'type_name' => $request->Stasionary
            

        ]);

        
        return redirect('/adminhomeonlogin/addtype');
        
    }

    public function edit(Request $request){
        $data = DB::table('table_type') -> get();
        return view ('admin.updatetype',['data'=>$data]);
    }
    
    public function update(Request $request){
        $this -> validate($request, [
            'newtypename' => 'required',
        ]);

        DB::table('table_type') -> where('id', $request->id) -> update([
            'type_name' => $request->newtypename
        ]);
        
        return redirect('/adminhomeonlogin/updatetype');
    }
    public function destroy(Request $request)
    {
       
    DB::table('table_type') -> where('id', $request->id) -> delete();
    return redirect('/adminhomeonlogin/updatetype');
    }
}
