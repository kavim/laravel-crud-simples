@extends('painel.templates.template')
@section('content')

@if(isset($errors) && count($errors) > 0 )
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
  </div>
@endif


@if(isset($product))

  <h1 class="titulo">
    <a href="{{url('painel/produtos/')}}" class="btn btn-default"><span class="glyphicon glyphicon-menu-left"></span> voltar</a>
    Produto: <i>{{$product->name}}</i>
  </h1>

  <p>{{$product->name}}</p>
  <p>{{$product->catetory}}</p>
  <p>{{$product->descri}}</p>


    @if(isset($product) && $product->active == 1)ativado @else Desativado @endif

    {!! Form::open(['route' => ['produtos.destroy',$product->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("deletar produto", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@else
produto nao exite
@endif

@endsection
