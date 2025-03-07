<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){
        return response()->json(['Customers' => 'Customer List']);
    }

    public function detail($id){
        return response()->json(['Customer' => 'Customer Detail']);
    }

    public function create(Request $request){
        return response()->json(['Customer' => 'Customer Create' .$request->name]);
    }

    public function update(Request $request, $id){
        return response()->json(['Customer' => 'Customer Update' .$id . ' ' .$request->name]);
    }

    public function delete($id){
        return response()->json(['Customer' => 'Customer Delete' .$id]);
    }
}
