@extends('painel.templates.template')
@section('content')
<h2>cadastro</h2>

@if(isset($errors) && count($errors) > 0 )
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
  </div>
@endif

<form class="form" method="post" action="{{url('/painel/produtos')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <input type="text" name="name" placeholder="Nome: " class="formcontrol" value="{{old('name')}}">
  </div>

  <div class="form-group">
    <input type="checkbox" name="active" value="1"> ativo?
  </div>

  <div class="form-group">
    <input type="text" name="number" placeholder="codigo do produto: " class="formcontrol" value="{{old('number')}}">
  </div>

    <div class="form-group">
      <select name="category" class="formcontrol">
        <option>Escolha category</option>
        @foreach($category as $valor)
        {{-- <option value="{{$category}}" @if(old('category') == $category) selected @endif>{{$category}}</option>﻿ --}}
        <option value="{{$valor}}">{{$valor}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
          <textarea name="descri" class="formcontrol" value="{{old('descri')}}"></textarea>
    </div>

    <div class="form-group">
          <button class="btn btn-primary">enviar</button>
    </div>
</form>
@endsection
