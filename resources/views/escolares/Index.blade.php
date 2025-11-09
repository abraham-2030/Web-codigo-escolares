@extends('layouts.app2')

@section('title', 'AutorizacionesInscripciones')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Autorizaciones Inscripciones</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('escolares.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Autorizaciones Inscripciones
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de aseguradoras -->
    <div class="card">
        <div class="card-body">
            @if($AutorizacionesInscripciones->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><Param></Param>Clave Periodo</th>
                                <th>No de Control</th>
                                <th>Tipo Autorizacion</th>
                                <th>Motivo Autorizacion</th>
                                <th>Quien Autoriza</th>
                                <th>Fecha Hora Autoriza</th>
                                <th>Materia Afectada</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($AutorizacionesInscripciones as $autorizacion)
                                <tr>
                                    <td>{{ $autorizacion->periodo}}</td>
                                    <td>{{ $autorizacion->no_de_control}}</td>
                                    <td>{{ $autorizacion->tipo_autorizacion}}</td>
                                    <td>{{ $autorizacion->motivo_autorizacion}}</td>
                                    <td>{{ $autorizacion->quien_autoriza}}</td>
                                    <td>{{ $autorizacion->fecha_hora_autoriza->format('d-m-Y H:i') }}</td>
                                    <td>{{ $autorizacion->materia_afectada}}</td>
                                    <td>{{ $autorizacion->cantidad}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('escolares.show',  $autorizacion->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('escolares.edit', $autorizacion->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('escolares.destroy', $autorizacion->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('¿Está seguro de eliminar AutorizacionesInscripciones?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay Autorizaciones Inscripciones registradas.
                    <a href="{{ route('escolares.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
