<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["name"];

    /**
     * The articles that belong to the tag.
     */
    public function articles()
    {
        return $this->belongsToMany("App\Models\Article");
    }

    /**
     * Returns a list of all tag names
     * if the '$article_id' is not provided
     * else tags related to an article
     *
     * @param integer|null $article_id optional
     * @return array A list of tag names
     */
    public static function get_tag_names($article_id = null)
    {
        if (is_null($article_id)) {
            $tags = DB::table("tags");
        } else {
            $article = \App\Models\Article::find($article_id);
            $tags = $article->tags();
        }

        return $tags->pluck("name")->all();
    }

    /**
     * Saves tags from the received tags list
     * and binds these tags to the $article
     *
     * @param array $tags_list Array of tag names
     * @param \App\Models\Article $article The article that belongs to the tags
     * @return void
     */
    public static function save_tags($tags_list, $article)
    {
        $tags = explode(",", $tags_list);

        foreach ($tags as $tag) {
            $tag_formatted = str_replace(" ", "_", trim(strtolower($tag)));
            $tag = static::updateOrCreate(["name" => $tag_formatted]);

            DB::table("article_tag")->updateOrInsert([
                "article_id" => $article->id,
                "tag_id" => $tag->id,
            ]);
        }
    }
}
