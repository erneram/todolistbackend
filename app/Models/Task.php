<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'item_list_id'
    ];

    public function itemList() {
        return $this->belongsTo(ItemList::class, 'list_id');
    }

}
