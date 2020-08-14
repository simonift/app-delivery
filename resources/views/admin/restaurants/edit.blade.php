@extends('layouts.app')

@section('title', 'Bienvenido a Delivereats')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>


<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar restaurant seleccionado</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Permite editar el restaurant-->
            <form method="post" action="{{ url('/admin/restaurants/'.$restaurants->id.'/edit') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del restaurant</label>
                            <!--Campo Nombre-->
                            <input type="text" class="form-control" name="name" value="{{ old('name', $restaurants->name) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Primer comentario</label>
                            <input type="text" class="form-control" name="first_comment" value="{{ old('first_comment', $restaurants->first_comment) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Segundo comentario</label>
                            <input type="text" class="form-control" name="second_comment" value="{{ old('second_comment', $restaurants->second_comment) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ old('slogan', $restaurants->slogan) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Contacto</label>
                            <input type="text" class="form-control" name="contact" value="{{ old('contact', $restaurants->contact) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Telefono</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $restaurants->phone) }}">
                        </div>
                    </div>
                                        
                </div>

                <!--Boton para enviar el formulario-->
                <button class="btn btn-primary">Guardar cambios</button>
                <a href="{{ url('/admin/restaurants') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection
