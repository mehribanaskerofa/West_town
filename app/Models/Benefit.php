<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Benefit extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='benefits';
    protected $guarded=[];
    public $translationModel=BenefitTranslation::class;
    public $translatedAttributes = ['title','description'];

    public function type()
    {
        return $this->belongsTo(BenefitsType::class,'benefits_type_id','id');
    }

}
