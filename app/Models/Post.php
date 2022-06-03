<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'post_title',
        'post_detail',
        'visitor_count',
        'is_share',
        'is_comment',
        'author_id',
        'admin_id',
    ];

    public function rSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }






}
