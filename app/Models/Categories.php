<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'tag', 'icon', 'description', 'active'];

    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }
}
