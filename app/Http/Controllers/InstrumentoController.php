<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Instrumento;


class InstrumentoController extends Controller
{
    public function index()
    {
        $instrumentos = Instrumento::all();
        return view('instrumentos', ['instrumentos' => $instrumentos]);
    }
    public function deleteInstrumento(Request $request){
        $rules = ['id_instrumento' => 'integer'];
        $validator = Validator::make($request->only('id_instrumento'), $rules);
        if($validator->fails()){
            return redirect('/')->withErrors($validator);
        }
        else{
            // Instrumento::find($request->id_instrumento->delete())
            if(Instrumento::where('id', $request->id_instrumento)->delete()){
                return redirect('/');
            }
        }
    }
}
