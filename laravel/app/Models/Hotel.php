<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hotels';

    /**
     * The items that belong to the hotel.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'items');
    }
}
