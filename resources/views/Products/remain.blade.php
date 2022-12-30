@php
    $remain = $model->isA()['remain'];

@endphp


<h6><span class="{{ !$remain ? 'badge-danger' : 'badge-success'}} rounded p-1">{{ $remain ? $remain.' Pieces' : 'Finished'}} </span></h6>
