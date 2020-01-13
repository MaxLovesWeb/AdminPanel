<div class="card card-{{ $type ?? 'default' }}">

    <div class="card-header">
    	
		{{ $header ?? '' }}

	</div>

    <div class="card-body">
    	<div class="tab-content" id="{{ $id ?? ''}}">

         	{{ $content ?? '' }}
         	{{ $slot }}

        </div>
  	</div>
              
</div>