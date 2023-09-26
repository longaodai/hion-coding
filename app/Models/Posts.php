<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title',
        'post_slug',
        'post_description',
        'post_active',
        'post_image',
        'author_id',
        'category_id',
        'post_sub_description',
        'post_views'
    ];

    protected $table = 'posts';

    protected function setPostSlugAttribute($value)
    {
        $this->attributes['post_slug'] = Str::slug($value);
    }

    /**
     * Relationship with category
     *
     * @return void
     *
     * @author longvc <vochilong.work@gmail.com>
     */
    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    /**
     * Relationship with user
     *
     * @return void
     *
     * @author longvc <vochilong.work@gmail.com>
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
