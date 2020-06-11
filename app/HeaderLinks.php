<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderLinks extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layout_header() {
        return $this->belongsTo(LayoutHeader::class);
    }
}
