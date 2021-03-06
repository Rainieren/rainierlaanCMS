<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'content',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
