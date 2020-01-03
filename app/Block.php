<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'page_id', 'name', 'identifier', 'status', 'content', 'order'
    ];
    /**
     *
     */
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
