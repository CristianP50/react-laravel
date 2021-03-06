@extends('layouts.app')

@section('template_title')
    {{ $restaurante->name ?? 'Show Restaurante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Restaurante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('restaurantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $restaurante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $restaurante->activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
