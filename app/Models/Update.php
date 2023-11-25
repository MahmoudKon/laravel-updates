<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Update extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    public const UPLOAD_PATH = 'uploads/updates';

    protected $fillable = ['link', 'version', 'file', 'path', 'type', 'size', 'name', 'extension', 'about'];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans(),
        );
    }

    protected function path(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace('\\', '/', $value),
        );
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value && file_exists(self::UPLOAD_PATH."/$value") ? asset(self::UPLOAD_PATH."/$value") : null,
        );
    }

    protected function size(): Attribute
    {
        return Attribute::make(
            get: function($value) {
                if ($value >= 1073741824) {
                    $value = number_format($value / 1073741824, 2) . ' GB';
                } elseif ($value >= 1048576) {
                    $value = number_format($value / 1048576, 2) . ' MB';
                } elseif ($value >= 1024) {
                    $value = number_format($value / 1024, 2) . ' KB';
                } elseif ($value > 1) {
                    $value = $value . ' bytes';
                } elseif ($value == 1) {
                    $value = $value . ' byte';
                } else {
                    $value = '0 bytes';
                }
                return $value;
            }
        );
    }

    public function getUpdateLink()
    {
        return $this->file ?? $this->link;
    }

    public static function getNextVersion()
    {
        $last_version = self::select('version')->latest('version')->limit(1)->value('version');
        $segments = explode('.', $last_version);
        $segments[ count($segments) - 1 ] = (int) end($segments) + 1;
        return implode('.', $segments);
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('search'), function($query, $search) {
                            $query->where('name', 'LIKE', "%$search%")
                                    ->orWhere('link', 'LIKE', "%$search%")
                                    ->orWhere('extension', 'LIKE', "%$search%")
                                    ->orWhere('about', 'LIKE', "%$search%");
                        });
    }
}
