<?php

namespace App\Models;

use FilamentCurator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Meta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'indexable',
        'og_image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'indexable' => 'boolean',
    ];

    protected $with = [
        'ogImage',
    ];

    public function ogImage(): HasOne
    {
        return $this->hasOne(Media::class, 'id', 'og_image');
    }

    public function metaable()
    {
        return $this->morphTo();
    }
}
