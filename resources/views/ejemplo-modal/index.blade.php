@extends('layouts.app')

@section('title', 'Ejemplo de modal')

@section('content')
    <h1 class="h3 mb-3">Ejemplo de modal</h1>

    <button type="button" class="btn btn-primary"
            data-bs-toggle="modal" data-bs-target="#modal-ejemplo">
        Abrir modal
    </button>

    <x-modal id="modal-ejemplo" title="Modal reutilizable">
        <p class="mb-0">Este contenido lo define cada vista.</p>
    </x-modal>
@endsection
