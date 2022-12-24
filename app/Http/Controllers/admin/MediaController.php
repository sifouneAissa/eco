<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomMedia;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\FileManipulator;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Filesystem;
use Spatie\MediaLibrary\Support\File;

class MediaController extends Controller
{
    //


    private function getBuilder($model){
        return config('default.media.'.$model.'.builder');
    }

    public function index(Request $request,$model){

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
            ])->orderBy('created_at', 'desc')->get();


            // get urls
            $medias = $medias->map(function ($item) {
                    $item['full_url'] = $item->getFullUrl().'?'.filemtime($item->getPath());
                    return $item;
            });

            return Inertia::render('Media',[
                'medias' => $medias,
                'model_id' => $model_id,
                'model' => $model,
                'modelData' => ($this->getBuilder($model))::find($model_id)
            ]);
    }

    public function store(Request $request){

        $builder = $this->getBuilder($request->input('model'));
        $model_id = $request->input('model_id');
        $model = $builder::find($model_id);

        $model ->addMedia($request->file('file'))
            ->toMediaCollection();

    }

    public function destroy($id){
        CustomMedia::find($id)->delete();
    }

    public function update(Request $request,$id){
        $media = CustomMedia::find($id);
        if($request->has('file'))
            $this->updateFile($request->file,$id);
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
}
