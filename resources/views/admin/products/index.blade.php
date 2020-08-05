@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('body-class', 'profile-page')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de Productos</h2>

      <div class="team">
        <div class="row">
          <div class="col-md-20 ml-auto mr-auto">
            <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="col-md-2 text-center">Nombre</th>
                  <th class="col-md-5 text-center">Descripción</th>
                  <th class="text-center">Categoría</th>
                  <th class="text-right">Precio</th>
                  <th class="text-right">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td class="text-center">{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->category_name }}</td>
                  <td class="text-right">&#36;{{ $product->price }}</td>
                  <td class="td-actions text-right">
                    <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                      @csrf
                      @method('DELETE')
                      <a href="{{ url('/products/'.$product->id) }}" rel="tootltip" title="Ver Producto" class="btn btn-info btn-simple btn-sm" target="_blank">
                        <i class="fa fa-info"></i>
                      </a>
                      <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" type="button" rel="tooltip" title="Editar Producto" class="btn btn-primary btn-simple btn-sm">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tootltip" title="Imágenes del producto" class="btn btn-warning btn-simple btn-sm">
                        <i class="fa fa-image"></i>
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

            {{ $products->links() }}
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