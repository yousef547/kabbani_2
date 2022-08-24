<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "categories";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function subCategory()
    {
        return $this->hasMany(subCategories::class);
    }
}
