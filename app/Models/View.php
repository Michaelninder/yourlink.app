<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class View extends Model
{
    use HasFactory;

    public $incrementing = false; // Because of UUID
    protected $keyType = 'string';

    protected $fillable = ['link_id', 'ip_address', 'user_agent'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
