<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Produto;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    private $produtos;
    private $categorias;

    public function __construct(Produto $produtos, Categoria $categorias)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }

    public function index()
    {
        $produtos = $this->produtos->all();
        $categorias = $this->categorias->all();
        return view('site.index',compact('produtos','categorias'));
    }
    public function categorias(Request $request){
        $produtos = Produto::with('categoria');
        if($request->categoria_id){
            $produtos->where('categoria_id',$request->categoria_id);
        }
        $produtos = $produtos->get();
        $categorias = Categoria::orderBy('categoria')->get();
        return view('site.categorias',compact('produtos','categorias'));
        // return redirect(route('buscar',compact('produtos')));
    }
    public function produtos(){
        $produtos = $this->produtos->all();
        return view('site.produtos',compact('produtos'));
    }
    public function busca(){
        $produtos = [];
        $categorias =[];
        $search = request('search');
        if ($search){
            $produtos = Produto::where([['nome','like','%'.$search.'%']])->get();
            if(count($produtos) == 0){
                $categorias = Categoria::where('categoria',$search)->first();
                if ($categorias == NULL){
                    $produto = [];
                }else{
                    $produtos = Produto::where('categoria_id',$categorias->id)->get();
                } 
            } 
        }
        return view('site.busca',compact('produtos','categorias','search'));
    }

    public function sematualizar(){
        $produtos = Produto::all();
        return json_encode($produtos);
    }
}