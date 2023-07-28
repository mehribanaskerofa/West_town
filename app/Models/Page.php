<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Page extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='pages';
    protected $guarded=[];
    public $translationModel=PageTranslation::class;
    public $translatedAttributes = ['title','slug','description','button'];

}
