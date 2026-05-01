<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 * @method static Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Model|Item findOrFail($id)
 * @mixin Builder
 */
class Item extends Model
{
    use HasFactory;
    protected $fillable = ['catalog_id','user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
