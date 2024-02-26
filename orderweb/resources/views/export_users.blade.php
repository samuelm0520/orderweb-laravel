@extends('templates.base_reports')
@section('header','reporte de Usuarios')
@section('content')
    <section id="results">
        @if ($technicians)
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $users['id'] }}</th>
                            <th>{{ $users['name'] }}</th>
                            <th>{{ $users['email'] }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
            <h5>No existen tecnicos</h5>
        @endif
    </section>
@endsection