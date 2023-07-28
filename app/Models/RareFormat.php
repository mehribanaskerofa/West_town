<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class RareFormat extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='rare_formats';
    protected $guarded=[];
    public $translationModel=RareFormatTranslation::class;
    public $translatedAttributes = ['title','description'];

}
