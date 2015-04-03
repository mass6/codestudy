<?php namespace Codestudy;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [
        'title',
        'body',
        'type',
        'category_id',
        'url'
    ];

    public function category()
    {
        return $this->belongsTo('Codestudy\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function platforms()
    {
        return $this->belongsToMany('Codestudy\Platform');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany('Codestudy\Language');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function frameworks()
    {
        return $this->belongsToMany('Codestudy\Framework');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Codestudy\Tag');
    }

}
