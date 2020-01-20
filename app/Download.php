<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{

    protected $fillable = ['user_id', 'filename'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
