@extends('templates.base')
@section('title', 'Listado de tipos actividad')
@section('header', 'Listado de tipos actividad')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip grap-2 d-md-block">
            <a href="{{ route('type_activity.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <@foreach ($type_activities as $type_activity)
                        <tr>
                            <td>{{ $type_activity['id'] }}</td>
                            <td>{{ $type_activity['tipo de prueba'] }}</td>
                            
                            <td>
                                <a href="{{ route('type_activity.edit', $type_activity['id']) }}" title="editar" 
                                class="btn btn-info btn-circle btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('type_activity.destroy', $type_activity['id']) }}" title="eliminar" 
                                class="btn btn-danger btn-circle btn-sm" onclick="return remove();">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
    
@endsection