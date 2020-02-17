

<table class="table table-bordered dt-bootstrap4 dt-table {{ $class }}" style="width:100%">

</table>
@push('js')

    <script>
        $(function() {

            $('.{{ $class }}').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                paginate: true,
                ajax: '{{ $url }}',
                columns: {!! json_encode($columns) !!},
                lengthMenu: [
                    [ 10, 50, 100, -1 ],
                    [ '10 rows', '50 rows', '100 rows', 'Show all' ]
                ],
                dom: '<Bf<t>ip>',
                buttons: [
                    {
                        text:      '<i class="fa fa-recycle"></i> {{ __('Reload') }}',
                        titleAttr: '{{ __('Reload table') }}',
                        action: function ( e, dt, button, config ) {

                            dt.ajax.reload();
                        },
                    },
                    {
                        extend: 'pageLength',
                    },
                    {
                        extend:    'copyHtml5',
                        text:      '<i class="fa fa-files-o"></i>',
                        titleAttr: '{{ __('datatable.buttons.copy') }}'
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fa fa-file-csv"></i>',
                        titleAttr: '{{ __('datatable.buttons.csv') }}'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>',

                        titleAttr: '{{ __('datatable.buttons.excel') }}'
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>',
                        titleAttr: '{{ __('datatable.buttons.pdf') }}',
                        title: 'Users',
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>',
                        titleAttr: '{{ __('datatable.buttons.print') }}',
                    },
                    {
                        extend:    'colvis',
                        text:      '<i class="fa fa-eye"></i>',
                        titleAttr: '{{ __('datatable.buttons.colvis') }}',
                    },
                ],
            });
        });
    </script>

@endpush
