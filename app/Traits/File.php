<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait File
{
    private static $path;


    protected static function upload(UploadedFile $file , string $path)
    {
        static::$path = $file->store($path);
        return new self;
    }
    protected static function storeAs(Model $model , string $column)
    {
        return $model->update([$column => static::$path]);
    }
    protected static function path()
    {
        return static::$path;
    }
    protected static function updateAs(UploadedFile $file,string $path, Model $model ,string $column)
    {
        if(!is_null($model->$column) && Storage::exists($model->$column))
        {
            Storage::delete($model->$column);
        }
        return static::upload($file , $path)->storeAs($model, $column);
    }

}
