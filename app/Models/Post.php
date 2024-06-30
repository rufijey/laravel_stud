<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $int)
 * @method static where(string $string, int $int)
 * @method static create(string[] $post)
 * @method static latest()
 * @method static findOrFail($id)
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    protected $table = 'posts';
    protected $guarded = false;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

}
