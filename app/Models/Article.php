<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["text", "title", "date"];

    /**
     * The tags that belong to the article.
     */
    public function tags()
    {
        return $this->belongsToMany("App\Models\Tag");
    }

    /**
     * Returns articles array
     *
     * @param string $tag_name If a tag name is provided returns
     *      articles with this tag
     *
     * @return array An array of articles
     */
    public static function get_articles($tag_name)
    {
        if (isset($tag_name)) {
            $tag = Tag::firstWhere("name", $tag_name);
            return isset($tag->id)
                ? Tag::find($tag->id)->articles()
                : abort(404);
        }

        return DB::table("articles");
    }
}
