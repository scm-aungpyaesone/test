<?php
namespace App\Models;

use Franzose\ClosureTable\Models\Entity;

class Item extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * ClosureTable model instance.
     *
     * @var \App\ItemClosure
     */
    protected $closure = 'App\Models\ItemClosure';

    /**
     * The hotels that belong to the item.
     */
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'item_hotel_groups');
    }
}
