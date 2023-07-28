<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Finishing extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='finishings';
    protected $guarded=[];
    public $translationModel=FinishingTranslation::class;
    public $translatedAttributes = ['title','description'];

}
