@extends('templates.base_reports')
@section('header','reporte general de tecnicos')
@section('content')
    <section id="results">
        @if ($technicians)
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technicians as $technician)
                        <tr>
                            <th>{{ $technician['document'] }}</th>
                            <th>{{ $technician['name'] }}</th>
                            <th>{{ $technician['especiality'] }}</th>
                            <th>{{ $technician['phone'] }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @else
            <h5>No existen tecnicos</h5>
        @endif
    </section>
@endsection