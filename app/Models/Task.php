<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use InvalidArgumentException;

/**
 * Task model
 * 
 * @property string $title (string, max 100 znakow)
 * @property string $slug (string, max 255 znakow, unikatowy dla całej bazy)
 * @property string $content (string, max 255 znakow)
 * @property string $status (string, wartosc z dostepnej listy) 
 */

class Task extends Model
{

    use HasFactory;
    
    /**
     * List of available statuses
     */
    protected const AVAILABLE_STATUSES = [
        'Active' => 'active',
        'Completed' => 'completed'
    ];
         
     /**
      * fillable
      *
      * @var array
      */
     protected $fillable = [
        'title', 'slug', 'content', 'status'
    ];

        
    /**
     * attributes
     *
     * @var array
     */
    protected $attributes = [
        'content' => '',
        'status' => self::AVAILABLE_STATUSES['Active']
    ];


    /**
     * Get task status by key
     * 
     * @param string $key - task status key
     * @return string - task status
     */
    public static function getStatus(string $key)
    {
        if (!array_key_exists($key, self::AVAILABLE_STATUSES)) {
            throw new InvalidArgumentException(
                sprintf('Status for key [$s] does not exist', $key)
            );
        }

        return self::AVAILABLE_STATUSES[$key];
    }


    /**
     * Get all available statuses
     * Keys or values
     * 
     * @param boolean $keys - If true return statutes keys, otherwhise values
     * @return array Available statuses keys or values
     */
    public static function getAvailableStatuses(bool $keys = false)
    {
        return ($keys) ? array_keys(self::AVAILABLE_STATUSES) : array_values(self::AVAILABLE_STATUSES);
    }


    /**
     * Model boot function
     * 
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Task $task) {
            $task->slug = $task->title;
        });

        static::updating(function (Task $task) {
            $task->slug = $task->title;
        });
    }

    public function getRouteKeyName() {
        return 'slug';
    }


    /**
     * Set model slug attribute
     * Before setting check similar slugs and set unique value
     * 
     * @param string $slug - Task slug
     * @return void
     */
    public function setSlugAttribute(string $slug)
    {
        $taskSlug = Str::slug($slug);

        $similarSlugs = Task::select('slug')
            ->where('slug', 'LIKE', "$taskSlug%")
            ->get();

        if ($similarSlugs->isNotEmpty()) {
            $similarCount = $similarSlugs->count();
            $taskSlug = Str::slug("{$taskSlug}-{$similarCount}");
        }

        $this->attributes['slug'] = Str::slug($slug);
    }
}
