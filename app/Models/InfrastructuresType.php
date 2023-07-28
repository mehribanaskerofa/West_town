<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class InfrastructuresType extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='infrastructures_type';
    protected $guarded=[];
    public $translationModel=InfrastructuresTypeTranslation::class;
    public $translatedAttributes = ['title'];

}
