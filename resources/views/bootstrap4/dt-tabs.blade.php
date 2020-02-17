<ul class="nav nav-tabs tabs-up">

    @foreach($tabs as $tab)
        <li><a href="{{ $href }}" data-target="{{ $dataTarget }}" class="media_node span" data-toggle="{{ $dataToggle }}" rel="tooltip"> {{ $label }} </a></li>
    @endforeach

</ul>

<div class="tab-content">

    @foreach($tabs as $tab)

        <div class="tab-pane" id="{{ $dataTarget }}">

        </div>

    @endforeach

</div>

@push('js')

    <script>
        $(function() {

            $('[data-toggle="{{ $dataToggle }}"]').click(function(e) {
                var $this = $(this),
                    url = $this.attr('href'),
                    targ = $this.attr('data-target');

                /*$.get(url, function(data) {
                    $(targ).html(data);
                });*/

                $(targ).load(url);

                $this.tab('show');

                $(targ).load(url);

                return false;
            });

        });
    </script>

@endpush
