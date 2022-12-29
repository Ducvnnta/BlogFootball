<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'category_id',
      'title',
      'slug',
      'description',
      'detail',
      'reads',
      'image_url',
      'link',
      'source'
    ];

    public function category(){
      return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'new_id', 'id');
    }
}
