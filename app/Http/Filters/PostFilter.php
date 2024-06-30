<?php

namespace App\Http\Filters;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    protected const TITLE = 'title';
    protected const CONTENT = 'content';
    protected const CATEGORY_ID = 'category_id';
    protected const TAGS = 'tags';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this,' content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::TAGS => [$this, 'tags'],
        ];
    }
    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
    public function tags(Builder $builder, $value)
    {
        foreach ($value as $tagId) {
            $builder->whereHas('tags', function ($q) use ($tagId) {
                $q->where('tags.id', $tagId);
            });
        }
    }

}
