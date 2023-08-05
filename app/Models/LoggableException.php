<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class LoggableException extends Model
{
    use HasFactory;

    protected $table = 'exceptions';

    protected $fillable = [
        'user_id',
        'request',
        'tracking_code',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'userName',
        'code',
        'formattedCreatedDate'
    ];

    public function getKey(): int
    {
        return $this->id;
    }
    // protected static function boot()
    // {
    //     static::creating(function (Model $loggableException) {
    //         $loggableException->tracking_code = self::generateUniqueTrackingCode();
    //     });
    // }

    //apend attributes
    public function getCodeAttribute(): string
    {   
        return $this->tracking_code;
    }

    public function getUserNameAttribute(): string
    {
        return (!empty($this->user) ? $this->user->name : '');
    }

    public function getFormattedCreatedDateAttribute(): string
    {
        return $this->created_at->format('Y-m-d');
    }
    
    //relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //actions
    public static function generateUniqueTrackingCode(): int
    {
        $lastRecord = LoggableException::latest()->first();
        $lastCode = ($lastRecord !== null) ? $lastRecord->tracking_code : 0;
        $randomStep = random_int(2,10);
        $TrackingCode = $lastCode + $randomStep;
        return $TrackingCode;
    }
    
    //scopes and repository related methods
    public function scopeFindByTrackingCode(Builder $query, int $trackingCode): LoggableException
    {
        return $query->whereTrackingCode($trackingCode)->first();
    }
}
