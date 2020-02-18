<div class="modal fade modal-danger" id="{{ $modal_id }}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {!! trans('Delete') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {!! trans('Delete Body Message') !!}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light pull-left" data-dismiss="modal">
                    <i class="fa fa-fw fa-times"></i> {{ __('Cancel') }}
                </button>

                <form id="{{ $form_id }}" action="{{ $route }}" method="POST" style="display: none;">
                    @method('delete')
                    {{ csrf_field() }}
                </form>

                <button type="submit" form="{{ $form_id }}" class="btn btn-danger pull-right btn-flat">
                    <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                </button>
            </div>
        </div>
    </div>
</div>



@push('js')

    <script type="text/javascript">

        $(function() {

            $('#confirmDelete').on('show.bs.modal', function (e) {
                var message = $(e.relatedTarget).attr('data-message');
                var title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-body p').text(message);
                $(this).find('.modal-title').text(title);
            });


        });

    </script>

@endpush
