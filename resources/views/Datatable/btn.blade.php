
@if(($model instanceof \App\Models\User  && (auth()->user()->id!== $model->id)) || !($model instanceof \App\Models\User))
@can($permissions['edit'])
<a
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Modifier"
   id="btn-edit"
   data-id="{{
    json_encode($model->toArray())
    }}"
>
    <i
        class="feather-edit h4 text-warning"></i>
</a>
@endcan
@can($permissions['show'])
<a href="#detail-model-{{$model->id}}"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Detail"
   id="btn-show"
   data-id="{{$model}}"
>
    <i class="feather-eye h4 text-success"></i>
</a>
@endcan
@can($permissions['delete'])
<a href="#delete-model-{{$model->id}}"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Delete"
   id="btn-delete"
   data-id="{{$model}}"
>
    <i class="feather-trash-2 h4 text-danger"></i>
</a>
@endcan
@endif
