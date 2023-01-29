<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomMedia;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use Spatie\MediaLibrary\FileManipulator;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Filesystem;
use Spatie\MediaLibrary\Support\File;

class MediaController extends Controller
{
    //

    public function __construct()
    {
//        $provider = request()->model;
//        $models = array_keys(config('default.media'));
//        $model_id = request()->input('model_id');
//        if(!$provider  || !$model_id || !in_array($provider,$models)) abort(404);
//
//        $this->middleware(['permission:view '.$provider.' media'])->only(['index']);
//        $this->middleware(['permission:edit '.$provider.' media'])->only(['update']);
//        $this->middleware(['permission:add '.$provider.' media'])->only(['store']);
//        $this->middleware(['permission:delete '.$provider.' media'])->only(['destroy']);
    }


    private function getBuilder($model){

        return config('default.media.'.$model.'.builder');
    }

    public function index(Request $request,$model){

            if(!auth()->user()->can('view '.$model.' media')) abort(401);

            $models = array_keys(config('default.media'));
            $model_id = $request->input('model_id');

            if(!$model  || !$model_id || !in_array($model,$models)) abort(404);

            $builder = config('default.media.'.$model);

            $medias = CustomMedia::where([
                [
                    'model_type' , $builder
                ],
                [
                    'model_id' , $model_id
                ]
            ])->orderBy('order')->get();


            // get urls
            $medias = $medias->map(function ($item) {
                    $item['full_url'] = $item->getFullUrl().'?'.filemtime($item->getPath());
                    return $item;
            });

            $modelData = ($this->getBuilder($model))::find($model_id);
            $modelData['provider'] = $modelData->mediaProvider();
            $modelData['crumb'] = $modelData->crumb();

            return Inertia::render('Media',[
                'medias' => $medias,
                'model_id' => $model_id,
                'model' => $model,
                'modelData' => $modelData
            ]);
    }

    public function store(Request $request){

        if(!auth()->user()->can('add '.$request->model.' media')) abort(401);

        $builder = $this->getBuilder($request->input('model'));
        $model_id = $request->input('model_id');
        $model = $builder::find($model_id);

        $media = $model ->addMedia($request->file('file'))
            ->toMediaCollection();

        $media->order = $model->load('media')->media->count();
        $media->save();
    }

    public function destroy(Request $request,$id){
//        if(!auth()->user()->can('delete '.$request->model.' media')) abort(401);
        $media = CustomMedia::find($id);
        $builder = app($media->model_type);
        $model = $builder::find($media->model_id);
        CustomMedia::find($id)->delete();
        $medias = $model->load('media')->media()->orderBy('order')->get();
        foreach ($medias as $key => $value){
            $value->order = $key;
            $value->save();
        }
    }

    public function update(Request $request,$id){

        if(!auth()->user()->can('edit '.$request->model.' media')) abort(401);

        $media = CustomMedia::find($id);

        $file = $request->file ? $request->file : $request->Ofile;

        if($file)
        $this->updateFile($file,$id);
    }



    public function updateFile($newFile,$id) {

        $model = CustomMedia::find($id);

        $fileName        = $newFile->getClientOriginalName();
        $fileName        = $this->sanitizeFileName($fileName);
        $currentFileName = $model->file_name;
        $path            = $newFile->path();
        $fileSystem      = app(Filesystem::class);
        $model->name      = pathinfo($fileName, PATHINFO_FILENAME);
        $model->file_name = $fileName;
        $model->mime_type = File::getMimetype($path);
        $model->size      = filesize($path);

        $fileSystem->removeFile($model,$model->getPath());

        // overwrite current file keep old name
        $fileSystem->copyToMediaLibrary($path, $model, false, $currentFileName);
        // when model model is saved, the file will be renamed appropriately to $fileName via $media->file_name

        return $model;
    }

    public function setCustomProperties(array $properties,$model) {
        foreach ($properties as $key => $val) {
            $model->setCustomProperty($key, $val);
        }
    }

    protected function sanitizeFileName(string $fileName): string {
        return str_replace(['#', '/', '\\'], '-', $fileName);
    }

    public function regenerate($model){

        /** @var FileManipulator $fileManipulator */
        $fileManipulator = app(FileManipulator::class);
        $fileManipulator->createDerivedFiles($model);
    }

    public function orderMedia(Request $request){
        $ids = $request->input('ids');

        foreach ($ids as $key => $value){
            $media = CustomMedia::find($value);
            $media->order = $key;
            $media->save();
        }

    }
}
