<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class StaticModel extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='statics';
    protected $guarded=[];
    public $timestamps=false;

    public $translationModel=StaticTranslation::class;
    public $translatedAttributes = ['title'];

}
