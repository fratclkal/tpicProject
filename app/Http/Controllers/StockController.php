<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    public function index(){
        $brands = Brand::get();
        return view('panel.stock',compact('brands'));
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'no'=>'required',
            'brand'=>'required|numeric|min:1|max:'.Brand::orderByDesc('id')->first()->id,
            'shelf'=>'required',
            'stock'=>'required',
            'unit'=>'required',
            'warehouse'=>'required',
        ]);
        $stock = new Product();
        $stock -> brand_id = $request -> brand;
        $stock -> product_name = $request -> name;
        $stock -> product_no = $request -> no;
        $stock -> shelf = $request -> shelf;
        $stock -> stock = $request -> stock;
        $stock -> unit = $request -> unit;
        $stock -> warehouse = $request -> warehouse;
        $stock -> save();

        return response() -> json(['stock'=>$stock]);
    }

    public function fetch(){
        $product = Product::query();
        return DataTables::of($product)
            ->editColumn('stock',function ($data){
                if($data->stock < 10){
                    return '<p style="color:red">'.$data->stock.'</p>';
                }
                return $data->stock;
            })
            ->addColumn('updateButton',function($data){
                return "<button onclick='getInfo(".$data->id.")' class='btn btn-warning'>Güncelle</button>";
            })
            ->addColumn('deleteButton',function($data){
                return "<button onclick='deleteStock(".$data->id.")' class='btn btn-danger'>Sil</button>";
            })
            ->addColumn('marka',function ($data){
                return $data -> getBrand-> brand_name;
        })->rawColumns(['updateButton','deleteButton','stock'])-> make();
    }

    public function get(Request $request){
        $request->validate([
           'id'=>'required|numeric|min:1|max:'.Product::orderByDesc('id')->first()->id,
        ]);
        $product = Product::find($request->id);


        return response()->json(['product' => $product]);
    }

    public function update(Request $request){
        $request->validate([
            'id'=>'required|numeric|min:1|max:'.Product::orderByDesc('id')->first()->id,
            'brand'=>'required|numeric|min:1|max:'.Brand::orderByDesc('id')->first()->id,
            'name'=>'',
            'no'=>'',
        ]);

        $product = Product::find($request->id);
        $product->update([
            'brand_id'=>$request->brand,
            'product_name'=>$request->name,
            'product_no'=>$request->no,
            'stock'=>$request->stock,
            'shelf'=>$request->shelf,
            'unit' => $request->unit,
            'warehouse' => $request->warehouse
        ]);

        return response(['success'=>'başarılı']);

    }

    public function delete(Request $request){
        $request->validate([
            'id'=>'required|numeric|min:1|max:'.Product::orderByDesc('id')->first()->id,
        ]);
        $product = Product::find($request->id);
        if($product->delete()){
            return response()->json(['message'=>'Stok başarıyla silindi.']);
        }else{
            return response()->json(['message'=>'Stok silinirken bir hata oluştu! Lütfen daha sonra tekrar deneyiniz!']);
        }
    }

    public function createbrand(Request $request){
        $brand = $request -> validate([
            'brand_name' => 'required'
        ]);

        Brand::create($brand);

        return response() -> json($brand);

    }


}
