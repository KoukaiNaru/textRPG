<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Model|Item findOrFail($id)
 * @mixin Builder
 */
class Item extends Model
{
    protected $fillable = ['title', 'description', 'power'];
}
