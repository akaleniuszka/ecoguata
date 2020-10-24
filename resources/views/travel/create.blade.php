@extends('layouts.app')

@section('custom')
    <link rel="stylesheet" href="css/custom.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card border-0 bg-light mb-3 shadow-sm">
                    <h4 class="card-header text-center">
                        ¿Listo para viajar?
                        <p class="lead small mb-0 text-center text-muted">Aquí podes crear un nuevo viaje</p>
                    </h4>
                    
                    <travel-form></travel-form>
                </div>
            </div>
        </div>
    </div>
@endsection