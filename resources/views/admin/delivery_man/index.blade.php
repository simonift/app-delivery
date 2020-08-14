@extends('layouts.app')

@section('title', 'Listado de Repartidores')

@section('body-class', 'profile-page')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de Repartidores</h2>

      <div class="team">
        <div class="row">
          <div class="col-md-20 ml-auto mr-auto">
            <a href="{{ url('/admin/delivery_men/create') }}" class="btn btn-primary btn-round">Nuevo Repartidor</a>
            <!--Permite mostrar el listado de todos los productos disponibles en la base de datos-->
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="col-md-2 text-center">Nombre</th>
                  <th class="col-md-2 text-center">Rut</th>
                  <th class="col-md-5 text-center">Descripción</th>
                  <th class="text-right">Telefono</th>
                  <th class="text-center">Restaurant</th>
                  <th class="text-right">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($delivery_men as $delivery_men)
                <tr>
                  <td class="text-center">{{ $delivery_men->id }}</td>
                  <td>{{ $delivery_men->name }}</td>
                  <td>{{ $delivery_men->rut }}</td>
                  <td>{{ $delivery_men->description }}</td>
                  <td>{{ $delivery_men->phone }}</td>
                  <td>{{ $product->restaurants_name }}</td>
                  <td class="td-actions text-right">
                    <form method="post" action="{{ url('/admin/delivery_men/'.$delivery_men->id) }}">
                      @csrf
                      @method('DELETE')
                      <a href="{{ url('/delivery_men/'.$delivery_men->id) }}" rel="tootltip" title="Ver Repartidor" class="btn btn-info btn-simple btn-sm" target="_blank">
                        <i class="fa fa-info"></i>
                      </a>
                    
                      <a href="{{ url('/admin/delivery_men/'.$delivery_men->id.'/edit') }}" type="button" rel="tooltip" title="Editar Repartidor" class="btn btn-primary btn-simple btn-sm">
                        <i class="fa fa-edit"></i>
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

            {{ $delivery_men->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@include('includes.footer')
@endsection