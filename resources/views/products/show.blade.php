@extends('layouts.app')

@section('title', 'Deliverits')

@section('body-class', 'profile-page')

@section('styles')
<style>
        .team .row .col-md-4 {
            margin-bottom: 3em;
        }
        .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 2px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>


<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                        <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                    </div>

                    <div class="name">
                        <h3 class="title">{{ $product->name }}</h3>
                        <h6>{{ $product->category->name }}</h6>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            
                <div class="description text-center">
                    <p>$ {{ $product->price }}</p>
                    <p>{{ $product->long_description }}</p>
                </div>

                <div class="team text-center">
                    @if (auth()->check())
                        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                            <i class="material-icons">add</i> Añadir al carrito de compras
                        </button>
                    @else
                        <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
                            <i class="material-icons">add</i> Añadir al carrito de compras
                        </a>
                    @endif
                </div> 
            
                <div class="team text-center">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="profile-tabs">
                                <div class="nav-align-center">
                                    <div class="tab-content gallery">
                                        <div class="tab-panel active" id="studio">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @foreach ($imagesLeft as $image)
                                                        <img src="{{ $image->url }}" class="img-raised rounded-circle img-fluid" />
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6">
                                                    @foreach ($imagesRight as $image)
                                                        <img src="{{ $image->url }}" class="img-raised rounded-circle img-fluid" />
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- End Profile Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
        </div>
        <form method="post" action="{{ url('/cart') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="modal-body">
                <input type="number" name="quantity" value="1" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
            </div>
        </form>
        </div>
    </div>
</div>         

@include('includes.footer')
@endsection