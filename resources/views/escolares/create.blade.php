@extends('layouts.app2')

@section('title', 'Nueva AutorizacionesInscripciones ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva AutorizacionesInscripciones</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('escolares.store') }}" method="POST">
                        @csrf
                        
                        <!-- periodo-->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                periodo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('periodo') is-invalid @enderror" 
                                id="periodo" 
                                name="periodo" 
                                value="{{ old('periodo') }}"
                                placeholder="Ej: ASG001"
                                required>
                            @error('periodo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- no_de_control -->
                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">
                                Numero de Control <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('no_de_control') is-invalid @enderror" 
                                id="no_de_control" 
                                name="no_de_control" 
                                value="{{ old('no_de_control') }}"
                                placeholder="Ej: Seguros Atlas"
                                required>
                            @error('no_de_control')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- tipo_autorizacion -->
                        <div class="mb-3">
                            <label for="tipo_autorizacion" class="form-label">
                                Tipo de Autorizacion  <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('tipo_autorizacion') is-invalid @enderror" 
                                id="tipo_autorizacion" 
                                name="tipo_autorizacion" 
                                value="{{ old('tipo_autorizacion') }}"
                                placeholder="Ej: Seguros Atlas"
                                required>
                            @error('tipo_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- motivo_autorizacion -->
                        <div class="mb-3">
                            <label for="motivo_autorizacion" class="form-label">
                                Motivo de Autorizacion <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('motivo_autorizacion') is-invalid @enderror" 
                                id="motivo_autorizacion" 
                                name="motivo_autorizacion" 
                                value="{{ old('motivo_autorizacion') }}"
                                placeholder="Ej: Seguros Atlas"
                                required>
                            @error('motivo_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- quien_autoriza -->
                        <div class="mb-3">
                            <label for="quien_autoriza" class="form-label">
                                Quien Autoriza <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('quien_autoriza') is-invalid @enderror" 
                                id="quien_autoriza" 
                                name="quien_autoriza" 
                                value="{{ old('quien_autoriza') }}"
                                placeholder="Ej: Seguros Atlas"
                                required>
                            @error('quien_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- fecha_hora_autoriza -->
                        <div class="mb-3">
                            <label for="fecha_hora_autoriza" class="form-label">
                                Fecha Hora Autorizada <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="datetime-local" 
                                class="form-control @error('fecha_hora_autoriza') is-invalid @enderror" 
                                id="fecha_hora_autoriza" 
                                name="fecha_hora_autoriza" 
                                value="{{ old('fecha_hora_autoriza') }}"
                                required>
                            @error('fecha_hora_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       

                        <!-- materia_afectada -->
                        <div class="mb-3">
                            <label for="materia_afectada" class="form-label">
                                Materias Afectadas <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('materia_afectada') is-invalid @enderror" 
                                id="materia_afectada" 
                                name="materia_afectada" 
                                value="{{ old('materia_afectada') }}"
                                placeholder="Ej: SEG-2024-001"
                                required>
                            @error('materia_afectada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- cantidad-->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">
                                Cantidad  <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="number" 
                                class="form-control @error('cantidad') is-invalid @enderror" 
                                id="cantidad" 
                                name="cantidad" 
                                value="{{ old('cantidad') }}"
                                placeholder="Ej: 2"
                                required>
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('escolares.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Autorizaciones Inscriciones 
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    