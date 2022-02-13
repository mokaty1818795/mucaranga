<div class="modal fade" id="{{ $modalDataId }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                {{ $modalBody ?? '' }}
            </div>
            <div class="modal-footer">
                {{ $modalFooter ?? '' }}
            </div>
        </div>
    </div>
</div>
