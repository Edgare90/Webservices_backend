<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Person;

class PersonController extends Controller
{
    public function getAll(){
        $data = Person::get();
        return response()->json($data, 200);
      }

      public function create(Request $request){
        $data['nombre'] = $request['nombre'];
        $data['email'] = $request['email'];
        $data['password'] = $request['password'];
        Person::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
      }


      public function delete($id){
        $res = Person::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }

      public function get($id){
        $data = Person::find($id);
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
        $data['nombre'] = $request['nombre'];
        $data['email'] = $request['email'];
        $data['password'] = $request['password'];
        Person::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }
}
