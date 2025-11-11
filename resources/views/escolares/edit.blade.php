@extends('layouts.app2')

@section('title', 'Autorizaciones Inscripciones')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Autorizaciones Inscripciones</h4>
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
                    <form action="{{ route('escolares.update', $autorizar->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- periodo (Solo lectura) -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                periodo
                            </label>
                            <input 
                                type="text" 
                                class="form-control bg-light" 
                                id="periodo"
                                 name="periodo" 
                                value="{{ $autorizar->periodo }}"
                                readonly
                                disable
                                >
                            <small class="text-muted">La clave si se puede modificar</small>
                        </div>

                        <!-- no_de_control -->
                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">
                                no_de_control <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('no_de_control') is-invalid @enderror" 
                                id="no_de_control" 
                                name="no_de_control" 
                                value="{{ old('no_de_control', $autorizar->no_de_control) }}"
                                required>
                            @error('no_de_control')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- tipo_autorizacion-->
                        <div class="mb-3">
                            <label for="tipo_autorizacion" class="form-label">
                                tipo_autorizacion <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('tipo_autorizacion') is-invalid @enderror" 
                                id="tipo_autorizacion" 
                                name="tipo_autorizacion" 
                                value="{{ old('tipo_autorizacion', $autorizar->tipo_autorizacion) }}"
                                required>
                            @error('tipo_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                       
                        <!-- Motivo de Autorizacion -->
                        <div class="mb-3">
                            <label for="motivo_autorizacion" class="form-label">
                                motivo_autorizacion <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('motivo_autorizacion') is-invalid @enderror" 
                                id="motivo_autorizacion" 
                                name="motivo_autorizacion" 
                                value="{{ old('motivo_autorizacion', $autorizar->motivo_autorizacion) }}"
                                required>
                            @error('motivo_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        

                        <!-- quien_autoriza-->
                        <div class="mb-3">
                            <label for="quien_autoriza" class="form-label">
                                quien_autoriza <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('quien_autoriza') is-invalid @enderror" 
                                id="quien_autoriza" 
                                name="quien_autoriza" 
                                value="{{ old('quien_autoriza', $autorizar->quien_autoriza) }}"
                                required>
                            @error('quien_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- fecha_hora_autoriza-->
                        <div class="mb-3">
                            <label for="fecha_hora_autoriza" class="form-label">
                                fecha_hora_autoriza <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="datetime-local" 
                                class="form-control @error('fecha_hora_autoriza') is-invalid @enderror" 
                                id="fecha_hora_autoriza" 
                                name="fecha_hora_autoriza" 
                                value="{{ old('fecha_hora_autoriza', $autorizar->fecha_hora_autoriza->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('fecha_hora_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- materia_afectada-->
                        <div class="mb-3">
                            <label for="materia_afectada" class="form-label">
                                materia_afectada <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('materia_afectada') is-invalid @enderror" 
                                id="materia_afectada" 
                                name="materia_afectada" 
                                value="{{ old('materia_afectada', $autorizar->materia_afectada) }}"
                                required>
                            @error('materia_afectada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- cantidad-->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">
                                cantidad <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('cantidad') is-invalid @enderror" 
                                id="cantidad" 
                                name="cantidad" 
                                value="{{ old('cantidad', $autorizar->cantidad) }}"
                                required>
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                       


                        <!-- Información adicional -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $autorizar->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $autorizar->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('escolares.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Autorización 
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
