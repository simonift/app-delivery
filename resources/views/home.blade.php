@extends('layouts.app')

@section('title', 'Delivereats | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter " data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')">
</div>
<div class="main main-raised">
        <div class="container">
            <div class="row">
                <div class="col-md-8 md-offset-2">
                    <h2 class="title">Panel de compras</h2>

                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif
                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="active">
                            <a class="nav-link" href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de Compras
                            </a>
                        </li>
                        <li class="active">
                            <a class="nav-link" href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos Realizados
                            </a>
                        </li>
                    </ul>
                    <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (auth()->user()->cart->details as $detail)
                            <tr>
                            <td class="text-center">
                                <img src="{{ $detail->product->featured_image_url }}" height="50">
                            </td>
                            <td>
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                            </td>
                            <td>&#36; {{ $detail->product->price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>&#36; {{ $detail->quantity * $detail->product->price }}</td>
                            <td class="td-actions text-center">
                                <form method="post" action="{{ url('/cart') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                <a href="{{ url('products/'.$detail->product->id) }}" target="_blank" rel="tootltip" title="Ver Producto" class="btn btn-info btn-simple btn-sm">
                                    <i class="fa fa-info"></i>
                                </a>
                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm">
                                    <i class="fa fa-times"></i>
                                </button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p><strong>Importe a pagar:</strong> {{ auth()->user()->cart->total }}</p>

                    <div class="text-center">
                        <form method="post" action="{{ url('/order') }}">
                            @csrf
                            
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
@include('includes.footer')
@endsection
