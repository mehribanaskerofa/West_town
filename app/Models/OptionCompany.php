<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class OptionCompany extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='option_company';
    protected $guarded=[];
    public $translationModel=BenefitTranslation::class;


}
