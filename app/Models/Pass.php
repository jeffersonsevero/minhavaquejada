<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    /** @use HasFactory<\Database\Factories\PassFactory> */
    use HasFactory;

    /**
     * Returns the category that this pass belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category>
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Returns the CowboyPass that represents the ownership relationship between this pass and the current user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<CowboyPass>
     */
    public function cowboyPass()
    {
        return $this->hasOne(CowboyPass::class);
    }

    /**
     * Returns the cowboy associated with this pass through the CowboyPass relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough<Cowboy>
     */
    public function main()
    {
        return $this->hasOneThrough(Cowboy::class, CowboyPass::class, 'pass_id', 'id', 'id', 'cowboy_id');
    }

    /**
     * Returns the cowboy that helped with this pass through the CowboyPass relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough<Cowboy>
     */
    public function helper()
    {
        return $this->hasOneThrough(Cowboy::class, CowboyPass::class, 'pass_id', 'id', 'id', 'helper_id');
    }

    public function getPriceAttribute()
    {
        return $this->category?->price;
    }
}
