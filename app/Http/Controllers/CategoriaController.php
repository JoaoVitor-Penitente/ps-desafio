<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categorias;

    public function __construct(Categoria $categorias)
    {
        
        $this->categorias = $categorias;
    }


    public function index()
    {
        $categorias = $this->categorias->all();
        return view('categoria.index',compact('categorias'));
    }


    public function create()
    {
        return view('categoria.crud');
    }


    public function store(CategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->categoria = $request->input('categoria');
        $categoria->save();

        return redirect(route('categoria.index'));
    }

    public function edit($id)
    {
        $categoria = $this->categorias->find($id);

        return view('categoria.crud', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id)
    {
        $datas = $request->all();
        $categoria= $this->categorias->find($id);
        $categoria->update($datas);
        return redirect(route('categoria.index'));
    }

    public function destroy($id)
    {
        
        $categoria = $this->categorias->find($id);
        $categoria->delete();
        return redirect(route('categoria.index'));
    }
}
