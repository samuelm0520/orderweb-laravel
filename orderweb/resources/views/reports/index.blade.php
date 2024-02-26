@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
    @include('templates.messages')
    
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte general de tecnicos
                    </h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.technicians') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte general de usuarios
                    </h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.users') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
            </div>
        </div>
    </div>



@endsection