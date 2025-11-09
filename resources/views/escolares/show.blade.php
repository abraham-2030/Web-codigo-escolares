@extends('layouts.app2')

@section('title', 'Detalle de Autorizaciones ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Autorizaciones</h4>
                    <div>
                        <a href="{{ route('escolares.edit', $autorizar->id) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('escolares.index') }}" 
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">periodo</th>
                                <td>{{ $autorizar->periodo}}</td>
                            </tr>
                            
                            <tr>
                                <th class="bg-light">No de Control</th>
                                <td>{{ $autorizar->no_de_control}}</td>
                            </tr>
                            

                            <tr>
                                <th class="bg-light">Tipo de Autorizacion</th>
                                <td>{{ $autorizar->tipo_autorizacion}}</td>
                            </tr>
                            

                            <tr>
                                <th class="bg-light">Motivo de Autorizacion</th>
                                <td>{{ $autorizar->motivo_autorizacion}}</td>
                            </tr>
                            

                            <tr>
                                <th class="bg-light">Quien Autoriza</th>
                                <td>{{ $autorizar->quien_autoriza}}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Fecha Hora de Autorizacion</th>
                                <td>
                                    {{ $autorizar->fecha_hora_autoriza->format('d/m/Y H:i') }}
                                    <small class="text-muted">({{ $autorizar->fecha_hora_autoriza->diffForHumans() }})</small>
                                </td>
                            </tr>
                            
                            <tr>
                                <th class="bg-light">Materia Afectada</th>
                                <td>{{ $autorizar->materia_afectada }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Cantidad</th>
                                <td>{{ $autorizar->cantidad }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Creado</th>
                                <td>{{ $autorizar->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Última Actualización</th>
                                <td>{{ $autorizar->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Botón de eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('escolares.destroy', $autorizar->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Está seguro de eliminar esta aseguradora?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Aseguradora
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
