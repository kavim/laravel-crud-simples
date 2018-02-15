@extends('painel.templates.template')
@section('content')
<h2>editar</h2>

@if(isset($errors) && count($errors) > 0 )
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
  </div>
@endif

@if(isset($product))
  <form class="form" action="{{route('produtos.update',$product->id)}}">
    {!! method_field('PUT')!!}
@else
<form class="form" method="post" action="{{url('/painel/produtos/')}}">
@endif
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <input type="text" name="name" placeholder="Nome: " class="formcontrol" value="{{$product->name or old('name')}}">
  </div>

  <div class="form-group">
    <input type="checkbox" name="active" value="1" @if(isset($product) && $product->active == 1) checked @endif> ativo?
  </div>

  <div class="form-group">
    <input type="text" name="number" placeholder="codigo do produto: " class="formcontrol" value="{{$product->number or old('number')}}">
  </div>

    <div class="form-group">
      <select name="category" class="formcontrol">
        <option>Escolha category</option>
        @foreach($category as $valor)
        {{-- <option value="{{$category}}" @if(old('category') == $category) selected @endif>{{$category}}</option>﻿ --}}
        <option value="{{$valor}}"
          @if(isset ($product) && $product->category == $valor)
            selected
          @endif
        >{{$valor}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
          <textarea name="descri" class="formcontrol">{{$product->descri or old('descri')}}</textarea>
    </div>

    <div class="form-group">
          <button class="btn btn-primary">enviar</button>
    </div>
</form>
@endsection
