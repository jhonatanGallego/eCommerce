<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Product;
Use Log;

class ProductController extends Controller
{
    // https://carbon.now.sh/
    public function getAll(){
        $data = Product::get();
        return response()->json($data, 200);
      }
  
      public function create(Request $request){
        $data['nombre'] = $request['nombre'];
        $data['categoria'] = $request['categoria'];
        $data['descripcion'] = $request['descripcion'];
        $data['imagen'] = $request['imagen'];
        $data['precio'] = $request['precio'];
        Product::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
      }
  
      public function delete($id){
        $res = Product::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
  
      public function get($id){
        $data = Product::find($id);
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
        $data['nombre'] = $request['nombre'];
        $data['categoria'] = $request['categoria'];
        $data['descripcion'] = $request['descripcion'];
        $data['imagen'] = $request['imagen'];
        $data['precio'] = $request['precio'];
        Product::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }
  }