<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class BenefitsType extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='benefits_type';
    protected $guarded=[];
    public $translationModel=BenefitsTypeTranslation::class;
    public $translatedAttributes = ['title'];

}
