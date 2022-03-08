@extends('layouts.site')

@section('title', 'Buscar Produto')
@section('content')
    <div class="container-search">
        <div class="search">
            <form class="search-form" action="{{route('buscar')}}" method="GET">
                @csrf
                <input type="text" id="search" name = "search" class="search-input" placeholder="pesquisar..">
                <button type="submit" class="button-search"><i class="fas fa-search"></i></button>
            </form>
            @if($search)
                <h2 class= "buscando">Buscando por {{ $search }}</h2>
            @else
                <h2 class= "buscando">Nenhuma pesquisa registrada, insira o nome do produto ou a categoria no campo acima</h2>
            @endif
        </div>
        @if (count($produtos) != 0)
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
        @elseif(count($produtos) == 0 && $search)
            <div class="sem-pesquisa">
                <h2>Produto não encontrado ou não existe disponível na loja</h2>
            </div>
        @else
            <div class="sem-pesquisa">
            </div>
        @endif
    </div>
@endsection



