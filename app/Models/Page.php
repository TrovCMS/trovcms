<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Trov\Concerns\HasFeaturedImage;
use Trov\Concerns\HasMeta;
use Trov\Concerns\HasPublishedScope;
use Trov\Concerns\Sluggable;

class Page extends Model
{
    use HasFactory;
    use HasPublishedScope;
    use Sluggable;
    use HasMeta;
    use SoftDeletes;
    use HasFeaturedImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'hero',
        'layout',
        'front_page',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'has_chat' => 'boolean',
        'hero' => 'array',
        'content' => 'array',
        'front_page' => 'boolean',
    ];

    protected $with = [
        'meta',
    ];

    protected static function booted()
    {
        static::creating(function ($page) {
            if ($page->front_page) {
                $oldFrontPage = Page::where('front_page', true)->first();
                if ($oldFrontPage) {
                    $oldFrontPage->update([
                        'front_page' => false,
                    ]);
                }

                $page->status = 'Published';
                $page->layout = 'full';
            }
        });

        static::updating(function ($page) {
            if ($page->front_page) {
                $oldFrontPage = Page::where('front_page', true)->first();
                if ($oldFrontPage && $oldFrontPage->id !== $page->id) {
                    $oldFrontPage->update([
                        'front_page' => false,
                    ]);
                }

                $page->status = 'Published';
                $page->layout = 'full';
            }
        });
    }

    public function scopeIsHomePage($query)
    {
        return $query->where('front_page', true)->first();
    }

    public function getPublicUrl()
    {
        return $this->front_page ? route('welcome') : route('pages.show', $this);
    }
}
