@if(($model instanceof \App\Models\User  && (auth()->user()->id!== $model->id)) || !($model instanceof \App\Models\User))

    @if(!(isset($without) && in_array('edit',$without)))
        @can($permissions['edit'])
            <a
                href="javascript: void(0)"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Edit"
                id="btn-edit"
                data-id="{{json_encode($model->toArray())}}"

            >
                <i
                    class="feather-edit h4 text-warning"></i>
            </a>
        @endcan
    @endif
    @if(!(isset($without) && in_array('show',$without)))
        @can($permissions['show'])
            <a
               href="javascript: void(0)"
               data-bs-toggle="tooltip"
               data-bs-placement="top"
               title="Show"
               id="btn-show"
               data-id="{{$model}}"

            >
                <i class="feather-eye h4 text-success"></i>

            </a>
        @endcan
    @endif

    @if(!(isset($without) && in_array('delete',$without)))
        @can($permissions['delete'])
            <a
               href="javascript: void(0)"
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
    @if(!(isset($without) && in_array('media',$without)))
        @can($permissions['media'])
            <a
                href="javascript: void(0)"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Media"
                id="btn-media"
                data-id="{{json_encode(['model' => $model->mediaProvider(),'model_id' => $model->id])}}"
            >
                <i class="feather-image h4"></i>
            </a>
        @endcan
    @endif
@endif
