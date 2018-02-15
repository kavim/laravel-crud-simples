@extends('painel.templates.template')

@section('content')
<h1 class="titulo">listagemw</h1>

<a href="{{url('painel/produtos/create')}}" class="btn btn-primary btn-add">
  <span class="glyphicon glyphicon-plus"></span> Cadastrar
</a>

<br>
<br>
<br>

<table class="table table-striped">

  <tr>
    <th>NOME</th>
    <th>descri</th>
    <th width='100px'>action</th>
  </tr>
  @foreach($products as $product)
  <tr>
    <td>{{$product->name}}</td>
    <td>{{$product->descri}}</td>
    <td>
      <a href="{{route('produtos.edit',$product->id)}}" class="actions edit">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
      <a href="{{route('produtos.show',$product->id)}}" class="actions delete">
        <span class="glyphicon glyphicon-trash"></span>
      </a>
    </td>
  </tr>
  @endforeach
</table>
{!! $products->links() !!}

@endsection
