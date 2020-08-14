@extends('layouts.app')

@section('title', 'Bienvenido a Delivereats')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>


<div class="main main-raised">
    <div class="profile-content">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">Registrar nuevo restaurant</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!--Permite registrar restaurants-->
                <form method="post" action="{{ url('/admin/restaurants') }}">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre del restaurant</label>
                                <!--Campo Nombre-->
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Primer comentario</label>
                                <input type="text" class="form-control" name="first_comment" value="{{ old('first_comment') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Segundo comentario</label>
                                <input type="text" class="form-control" name="second_comment" value="{{ old('second_comment') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Slogan</label>
                                <input type="text" class="form-control" name="slogan" value="{{ old('slogan') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Contacto</label>
                                <input type="text" class="form-control" name="contact" value="{{ old('contact') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Telefono</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <!--Boton para enviar el formulario-->
                    <button class="btn btn-primary">Registrar restaurant</button>
                    <a href="{{ url('/admin/restaurants') }}" class="btn btn-default">Cancelar</a>
                </form>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
@endsection
