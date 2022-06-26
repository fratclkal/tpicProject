<?php

namespace App\Http\Controllers;

use App\Models\Firat;
use Illuminate\Http\Request;

class FiratController extends Controller
{
    public function index(){
        $firat = Firat::orderBy('id','DESC')->get();
        return view('panel.firat',compact('firat'));
    }

    public function addFirat(Request $request){
        $firat = new Firat();
        $firat -> name = $request -> name;
        $firat -> title = $request -> title;
        $firat -> start_date = $request -> start_date;
        $firat -> finish_date = $request -> finish_date;
        $firat -> save();
        return response() -> json($firat);
    }

    public function getFirat($id){
        $firat = Firat::find($id);
        return response() -> json($firat);
    }

    public function updateFirat(Request $request){
        $firat = Firat::find($request -> id);
        $firat -> name = $request -> name;
        $firat -> title = $request -> title;
        $firat -> start_date = $request -> start_date;
        $firat -> finish_date = $request -> finish_date;
        $firat -> save();

        return response() -> json($firat);
    }

    public function deleteFirat($id){
        $firat = Firat::find($id);
        $firat -> delete();
        return response() -> json(['success' => 'Record has been deleted']);
    }
}
