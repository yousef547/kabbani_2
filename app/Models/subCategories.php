<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategories extends Model
{
    use HasFactory;
    protected $table = "sub_categories";
    protected $guarded = ['id', 'created_at', 'updated_at'];


    // public function getPhotoAttribute($val)
    // {
    //     return ($val !== null) ? asset($val) : ""; 
    // }

    // public function getIconAttribute($val)
    // {
    //     return ($val !== null) ? asset($val) : ""; 
    // }
    
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'active' : 'unactive';
    }

    public function sub_sub_category() 
    {
        return $this->hasMany(Sub_Sub_Category::class , 'sub_category_id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function mainCategory() 
    {
        return $this->belongsTo(MainCategory::class , 'main_category_id');
    }
}
