<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Option extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='options';
    protected $guarded=[];
    public $translationModel=OptionTranslation::class;
    public $translatedAttributes = ['title'];


//    public function options()
//    {
//        return $this->belongsToMany(Company::class,OptionCompany::class,'company_id','option_id');
//    }
}
