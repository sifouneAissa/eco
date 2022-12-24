@if(($model instanceof \App\Models\User  && (auth()->user()->id!== $model->id)) || !($model instanceof \App\Models\User))


    @if(!(isset($without) && in_array('edit',$without)))
        @can($permissions['edit'])
            @php
                if(isset($model))
                    // edit
                      $model['ShowEditModal'] = !\Illuminate\Support\Facades\Route::has($model->modal_ids['edit']) ;

            @endphp
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
        @else
        @endcan
    @endif
    @if(!(isset($without) && in_array('show',$without)))
        @can($permissions['show'])

            @php
                if(isset($model))
                    // edit
                      $model['ShowShowModal'] = !\Illuminate\Support\Facades\Route::has($model->modal_ids['show']) ;

            @endphp
            <a
                href="javascript: void(0)"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Show"
                id="btn-show"
                data-id="{{json_encode($model->toArray())}}"

            >
                <i class="feather-eye h4 text-success"></i>

            </a>
        @endcan
    @endif

    @if(!(isset($without) && in_array('delete',$without)))
        @can($permissions['delete'])

            @php
                if(isset($model))
                    // edit
                      $model['ShowDeleteModal'] = !\Illuminate\Support\Facades\Route::has($model->modal_ids['delete']) ;

            @endphp
            <a
                href="javascript: void(0)"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Delete"
                id="btn-delete"
                data-id="{{json_encode($model->toArray())}}"

            >
                <i class="feather-trash-2 h4 text-danger"></i>
            </a>
        @endcan
    @endif

    @if(!(isset($without) && (in_array('media',$without))) && array_key_exists('media',$permissions))
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
