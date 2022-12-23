@foreach($model->getRoleNames() as $role)
    @if($loop->index<=10)
    <span class="badge badge-success">{{$role}}</span>
    @endif
@endforeach
