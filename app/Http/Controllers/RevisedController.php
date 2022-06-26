<?php

namespace App\Http\Controllers;

use App\Models\Revised;
use Illuminate\Http\Request;

class RevisedController extends Controller
{

    public function panel_index(){
        return view('panel.home');
    }
    public function deneme(){
        return view('panel.revisedList');
    }

    public function index(){
        return view('panel.revised');
    }


    public function createRevised(Request $request){
        $revised = new Revised();
        $revised -> name = $request -> name;
        $revised -> title = $request -> title;
        $revised -> content = $request -> content;
        $revised -> material_name = $request -> material_name;
        $revised -> start_date = $request -> start_date;
        $revised -> finish_date = $request -> finish_date;

        if($file = $request -> file('path')){
            foreach($request->file('path') as $file)
            {
                $name = $file -> getClientOriginalName();
                $file -> move('fotograf/',$name);
                $files[] = $name;
            }

        }

        $revised -> path = json_encode($files);
        $revised -> save();

        return response() -> json([
            'succes' => true
        ]);

    }

    public function listRevised(){
        $revised = Revised::all();
        return view('panel.revisedList',compact('revised'));
    }

    public function deleteRevised(Request $request){
        $revised = Revised::find($request -> id);
        $revised -> delete();

        return response() -> json([
            'message' => true
        ]);

    }

    public function getRevised(Request $request ){
        $revised = Revised::find($request -> id);

        return response() -> json([
            'revised' => $revised
        ]);
    }


    public function updateRevised(Request $request){
        $revised = Revised::find($request -> id)->update([
            'name' => $request -> name,
            'title' => $request -> title,
            'content' => $request -> content,
            'material_name' => $request -> material_name,
            'start_date' => $request -> start_date,
            'finish_date' => $request -> finish_date

        ]);



        return response() -> json([
            'revised' => $revised
        ]);
    }


}
