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
                <h2 class="title">Registrar nuevo repartidor</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ url('/admin/delivery_man') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="form-group label-floating">
                              <label class="control-label">Nombre del repartidor</label>
                          
                              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="form-group label-floating">
                              <label class="control-label">Rut del repartidor</label>
                          
                              <input type="text" class="form-control" name="rut" value="{{ old('rut') }}">
                            </div>
                        </div>

                    </div>
                  
                    <div class="form-group label-floating">
                      <label class="control-label">Descripción</label>
                      <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>

                    <div class="form-group label-floating">
                      <label class="control-label">Telefono</label>
                      <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Restaurant</label>
                            <select class="form-control" name="restaurants_id">
                                <option value="0">General</option>
                                @foreach ($restaurants as $restaurants)
                                <option value="{{ $restaurants->id }}">{{ $restaurants->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!--Boton para enviar el formulario-->
                    <button class="btn btn-primary">Registrar producto</button>
                    <a href="{{ url('/admin/delivery_man') }}" class="btn btn-default">Cancelar</a>

                </form>
              </div>
          </div>
      </div>
  </div>
  @include('includes.footer')
  @endsection