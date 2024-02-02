@extends('templates.base')
@section('title', 'Editar Técnico')
@section('header','Editar Técnico')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="document">Documento</label>
                        <input type="text" class="form-control"
                        id="description" name="description" required>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                    <label for="especiality">Especialidad</label>
                    <input type="text" class="form-control"
                    id="especiality" name="especiality" required>
                  
                    

                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="phone">Telefono</label>
                        <input type="number" class="form-control"
                        id="phone" name="phone" required>
                        </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block"
                            type="submit">
                            Guardar
                        </button>
                    </div>
                   
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('technician.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


