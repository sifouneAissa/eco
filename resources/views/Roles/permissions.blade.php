@foreach($model->getAllPermissions()->pluck('name') as $permission)
    @if($loop->index<=10)
    <span class="badge badge-primary">{{$permission}}</span>@if($loop->index==10)<span class="h5"> ......</span>@endif
    @endif

@endforeach
