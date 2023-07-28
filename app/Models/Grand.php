<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Grand extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='grands';
    protected $guarded=[];
    public $translationModel=GrandTranslation::class;
    public $translatedAttributes = ['title','description'];

}
