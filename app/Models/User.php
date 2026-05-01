<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'coins', 'level','catalog_id'];
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

}
