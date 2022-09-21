<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeGood extends Model
{
    use HasFactory;
    public $fillable=["quantity","min_quantity","good_id","storehouse_id"];
    public $hidden=["created_at","updated_at"];
}
