@extends('layouts.app')

@section('title', 'Listado de restaurants')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}')"></div>


<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de restaurantes</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/restaurants/create') }}" class="btn btn-primary btn-round">Nuevos restaurantes</a>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-2 text-center">Primer comentario</th>
                                <th class="col-md-2 text-center">Segundo comentario</th>
                                <th class="col-md-5 text-center">Slogan</th>
                                <th class="col-md-2 text-center">Contacto</th>
                                <th class="col-md-2 text-center">Telefono</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $key => $restaurants)
                            <tr>
                                <td>{{ $restaurants->name }}</td>
                                <td>{{ $restaurants->first_comment }}</td>
                                <td>{{ $restaurants->second_comment }}</td>
                                <td>{{ $restaurants->slogan }}</td>
                                <td>{{ $restaurants->contact }}</td>
                                <td>{{ $restaurants->phone }}</td>
                                
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/restaurants/'.$restaurants->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a href="#" rel="tooltip" title="Ver restaurant" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                   
                                        <a href="{{ url('/admin/restaurants/'.$restaurants->id.'/edit') }}" rel="tooltip" title="Editar restaurant" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                      
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
