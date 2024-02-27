@extends('templates.base_reports')
@section('header','reporte de Usuarios')
@section('content')
    <section id="results">
        @if ($users)
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user['id'] }}</th>
                            <th>{{ $user['name'] }}</th>
                            <th>{{ $user['email'] }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
            <h5>No existen tecnicos</h5>
        @endif
    </section>
@endsection