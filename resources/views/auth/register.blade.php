@extends('layouts.app')

@section('body-class', 'signup-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('/img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('register') }}">
              @csrf
              
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Registro</h4>
                <!--
                <div class="social-´line">

                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>

                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>

                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>

                </div> -->
              </div> 

              <p class="description text-center">Completa tus datos</p>
              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name', $name) }}" required autofocus>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">fingerprint</i>
                    </span>
                  </div> 
                  <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required>
                  </div> 
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico..." name="email" value="{{ old('email', $email) }}" required autofocus>
                </div>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                    <input id="phone" type="phone" placeholder="Teléfono" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                </div>                            

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="material-icons">class</i>
                    </span>
                    <input id="address" type="text" placeholder="Dirección" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
                </div>  

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required autofocus/>
                </div>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <input placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required autofocus/>
                </div>
              </div>

                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Confirmar registro</a>
                </div>
                  <!--
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                  -->
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('includes.footer')
</div>
@endsection
