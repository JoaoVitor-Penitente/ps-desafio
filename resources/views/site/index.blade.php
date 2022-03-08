@extends('layouts.site')

@section('title', 'Loja')

@section('content')
    <div class="banner">
        <img class="banner-imagem pc" src="/bannerPc.svg" alt="imagem do produto">
        <img class="banner-imagem celular" src="/bannerCelular.svg" alt="imagem do produto">
    </div>
    <h1>Produtos mais vendidos</h1>
    <div class="container">
        @foreach ($produtos->take(6) as $produto)
        <section class = "produto">
            <div class="card">
                <h2 class="titulo">{{$produto->nome}}</h2>
                <span class="categoria">{{$produto->categoria()->pluck('categoria')->first()}}</span>
                <img class="imagem" src="/storage/{{$produto->imagem }} " alt="imagem do produto">
                <p class="texto">{{$produto->descricao}}</p>
                @if($produto->quantidade > 0)
                    <div class="estoque">
                        <span class="quantidade">Quantidade: {{$produto->quantidade }}</span>
                        <span class="preco">Preço: R$ {{$produto->preco}}</span>
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