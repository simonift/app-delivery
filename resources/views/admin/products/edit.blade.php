@extends('layouts.app')

@section('title', 'Bienvenido a Delivereats')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter " data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}');">
</div>

<div class="main main-raised">
<div class="profile-content">

  <div class="container">
    <div class="row">
      <div class="col-md-8 md-offset-2">
        <h2 class="title">Editar producto seleccionado</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
          @csrf
          <div class="row">      
            <div class="col-md-6 ml-auto mr-auto">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre del producto</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Precio del producto</label>
                  <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                </div>
              </div>
          </div>
          <div class="row"> 
            <div class="form-group label-floating">
              <label class="control-label">Descripción corta</label>
              <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                  <label class="control-label">Categoría del producto</label>
                  <select class="form-control" name="category_id">
                      <option value="0">General</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>
                          {{ $category->name }}
                      </option>
                      @endforeach
                  </select>
              </div>
          </div>

          <textarea class="form-control" placeholder="Descripción extensa del producto" rows="4" name="long_description">{{ $product->long_description }}</textarea>

          <button class="btn btn-primary">Guardar Cambios</button>
          <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
