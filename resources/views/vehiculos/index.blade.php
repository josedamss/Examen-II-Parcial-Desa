@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Vehiculos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opciones</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Desplegar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Desabilitado</a>
        </li>

        <li class="nav-item">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Agregar Vehículo
          </button>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<form action="{{ route('vehiculos.store') }}" method="POST">
    @csrf

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar vehículo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="numero_placa" class="form-label">Número de placa</label>
                        <input type="text" class="form-control" id="numero_placa"
                               name="numero_placa" value="{{ old('numero_placa') }}"
                               placeholder="Ingrese el número de placa">
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca"
                               name="marca" value="{{ old('marca') }}"
                               placeholder="Ingrese la marca">
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo"
                               name="modelo" value="{{ old('modelo') }}"
                               placeholder="Ingrese el modelo">
                    </div>

                    <div class="mb-3">
                        <label for="tipo_vehiculo" class="form-label">Tipo de vehículo</label>
                        <input type="text" class="form-control" id="tipo_vehiculo"
                               name="tipo_vehiculo" value="{{ old('tipo_vehiculo') }}"
                               placeholder="Ingrese el tipo de vehículo">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color"
                               name="color" value="{{ old('color') }}"
                               placeholder="Ingrese el color">
                    </div>

                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="text" class="form-control" id="capacidad"
                               name="capacidad" value="{{ old('capacidad') }}"
                               placeholder="Ingrese la capacidad">
                    </div>

                    <div class="mb-3">
                        <label for="tarifa_diaria" class="form-label">Tarifa diaria</label>
                        <input type="text" class="form-control" id="tarifa_diaria"
                               name="tarifa_diaria" value="{{ old('tarifa_diaria') }}"
                               placeholder="Ejemplo: 100.00">
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado"
                               name="estado" value="{{ old('estado') }}"
                               placeholder="Ingrese el estado">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Número Placa</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Tipo de Vehículo</th>
            <th scope="col">Color</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Tarifa Diaria</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($vehiculos as $vehiculo)
            <tr>
                <th scope="row">{{ $vehiculo->id }}</th>
                <td>{{ $vehiculo->numero_placa }}</td>
                <td>{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td>{{ $vehiculo->tipo_vehiculo }}</td>
                <td>{{ $vehiculo->color }}</td>
                <td>{{ $vehiculo->capacidad }}</td>
                <td>{{ $vehiculo->tarifa_diaria }}</td>
                <td>{{ $vehiculo->estado }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Acciones del vehículo">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#update{{ $vehiculo->id }}">
                            Actualizar
                        </button>

                        <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal fade" id="update{{ $vehiculo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="update{{ $vehiculo->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="update{{ $vehiculo->id }}Label">Editar vehículo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="numero_placau{{ $vehiculo->id }}" class="form-label">Número de placa</label>
                                                <input type="text" class="form-control" id="numero_placau{{ $vehiculo->id }}"
                                                       name="numero_placa" value="{{ old('numero_placa', $vehiculo->numero_placa) }}"
                                                       placeholder="Ingrese el número de placa">
                                            </div>

                                            <div class="mb-3">
                                                <label for="marcau{{ $vehiculo->id }}" class="form-label">Marca</label>
                                                <input type="text" class="form-control" id="marcau{{ $vehiculo->id }}"
                                                       name="marca" value="{{ old('marca', $vehiculo->marca) }}"
                                                       placeholder="Ingrese la marca">
                                            </div>

                                            <div class="mb-3">
                                                <label for="modelou{{ $vehiculo->id }}" class="form-label">Modelo</label>
                                                <input type="text" class="form-control" id="modelou{{ $vehiculo->id }}"
                                                       name="modelo" value="{{ old('modelo', $vehiculo->modelo) }}"
                                                       placeholder="Ingrese el modelo">
                                            </div>

                                            <div class="mb-3">
                                                <label for="tipo_vehiculou{{ $vehiculo->id }}" class="form-label">Tipo de vehículo</label>
                                                <input type="text" class="form-control" id="tipo_vehiculou{{ $vehiculo->id }}"
                                                       name="tipo_vehiculo" value="{{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) }}"
                                                       placeholder="Ingrese el tipo de vehículo">
                                            </div>

                                            <div class="mb-3">
                                                <label for="coloru{{ $vehiculo->id }}" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="coloru{{ $vehiculo->id }}"
                                                       name="color" value="{{ old('color', $vehiculo->color) }}"
                                                       placeholder="Ingrese el color">
                                            </div>

                                            <div class="mb-3">
                                                <label for="capacidadu{{ $vehiculo->id }}" class="form-label">Capacidad</label>
                                                <input type="text" class="form-control" id="capacidadu{{ $vehiculo->id }}"
                                                       name="capacidad" value="{{ old('capacidad', $vehiculo->capacidad) }}"
                                                       placeholder="Ingrese la capacidad">
                                            </div>

                                            <div class="mb-3">
                                                <label for="tarifa_diariau{{ $vehiculo->id }}" class="form-label">Tarifa diaria</label>
                                                <input type="text" class="form-control" id="tarifa_diariau{{ $vehiculo->id }}"
                                                       name="tarifa_diaria" value="{{ old('tarifa_diaria', $vehiculo->tarifa_diaria) }}"
                                                       placeholder="Ejemplo: 100.00">
                                            </div>

                                            <div class="mb-3">
                                                <label for="estadou{{ $vehiculo->id }}" class="form-label">Estado</label>
                                                <input type="text" class="form-control" id="estadou{{ $vehiculo->id }}"
                                                       name="estado" value="{{ old('estado', $vehiculo->estado) }}"
                                                       placeholder="Ingrese el estado">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10">No hay vehículos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
