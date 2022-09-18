<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class category extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    public $fillable=["name","logo","description","meta_title","meta_logo","keywords","status"];

}
