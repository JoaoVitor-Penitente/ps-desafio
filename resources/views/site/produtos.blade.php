@extends('layouts.site')

@section('content')
    <h1 class="todos-produtos">Todos Produtos</h1>
    <div class="container">
        @foreach ($produtos as $produto)
        <section class = "produto">
            <div class="card">
                <h2 class="titulo">{{$produto->nome}}</h2>
                <span class="categoria">{{$produto->categoria()->pluck('categoria')->first()}}</span>
                <img class="imagem" src="/storage/{{$produto->imagem }} " alt="imagem do produto">
                <p class="texto">{{$produto->descricao}}</p>
                @if($produto->quantidade > 0)
                    <div class="estoque">
                        <span class="quantidade">quantidade: {{$produto->quantidade }}</span>
                        <span class="preco">preço: R$ {{$produto->preco}}</span>
                    </div>
                    
                @else
                    <div class="esgotado">
                        <p>Esgotado</p>
                    </div>
                @endif
            </div>
        </section>
        @endforeach
    </div>
@endsection

