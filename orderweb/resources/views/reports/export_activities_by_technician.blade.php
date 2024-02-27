@extends('templates.base_reports')
@section('header','reporte actividades por tecnico')
@section('content')
    <section id="results">
        @if ($activities)
            <p style="font-size:14px,"><strong>Actividades:</strong></p>    
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Horas</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <th>{{ $activity['id'] }}</th>
                            <th>{{ $activity['description'] }}</th>
                            <th>{{ $activity['hours'] }}</th>
                            <th>{{ $activity->type_activity->description }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        @endif
    </section>
@endsection