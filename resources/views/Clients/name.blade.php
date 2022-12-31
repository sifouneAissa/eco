@php
    $stars = $model->stars(10,5);
@endphp

{{$model->name}}
@for($i=0;$i<$stars;$i++)
    <span class="text-success h5">★</span>
@endfor

@if(!$stars)
    <span class="badge badge-danger rounded p-1">New</span>
@endif

