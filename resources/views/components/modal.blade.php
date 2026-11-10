@props(['id', 'title'])

@push('modals')
    <div class="modal fade" id="{{ $id }}" tabindex="-1"
         aria-labelledby="{{ $id }}-titulo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="{{ $id }}-titulo">{{ $title }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    {{ $slot }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
@endpush
