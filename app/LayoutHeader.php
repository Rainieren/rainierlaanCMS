<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayoutHeader extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    public function links() {
        return $this->hasMany(HeaderLinks::class);
    }
}
