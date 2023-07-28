<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Team extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='teams';
    protected $guarded=[];
    public $translationModel=TeamTranslation::class;
    public $translatedAttributes = ['title'];

}
