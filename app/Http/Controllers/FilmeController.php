<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmeController extends Controller
{
    public function criar(Request $request){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'diretor' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Filme::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);


    }

    public function buscarPeloId($id){
        $customer = Filme::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Customer found successfully',
            'data' => $customer
        ], 200);


    }

    public function atualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'diretor' => 'required|string|max:150'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Filme::findOrFail($id);
        $customer->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], 200);

    }

    public function deletar($id){
        $customer = Filme::findOrFail($id);
        $customer->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Customer deleted successfully'
        ], 204);
    }

    public function listar(){
        $customers = Filme::all();
        return response()->json([
            'status' => true,
            'message' => 'Customers retrieved successfully',
            'data' => $customers
        ], 200);
       
    }






    //
}
