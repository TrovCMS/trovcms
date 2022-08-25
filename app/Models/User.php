<?php

namespace App\Models;

use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasFilamentShield;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'bio',
        'facebook_handle',
        'twitter_handle',
        'instagram_handle',
        'linkedin_handle',
        'youtube_handle',
        'pinterest_handle',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::deleting(function ($author) {
            if ($author->avatar) {
                Storage::delete("avatars/{$author->avatar}");
            }
        });
    }

    public function canAccessFilament(): bool
    {
        return $this->getRoleNames()->isNotEmpty();
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? $this->avatar : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=FFFFFF&background=111827';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }
}
