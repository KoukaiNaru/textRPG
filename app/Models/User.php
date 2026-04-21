<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = ['name', 'coins', 'level','catalog_id'];
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

}
