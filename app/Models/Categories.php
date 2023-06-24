<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'tag', 'icon', 'description', 'active'];

    protected $table = 'categories';

    protected function setSlugAttribute($value)
    {
        $value = str_replace('/', '-', $value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }
}
