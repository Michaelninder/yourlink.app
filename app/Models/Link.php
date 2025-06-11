<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Link extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'original_url',
        'short_code',
        'is_custom',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
	public function views()
	{
	    return $this->hasMany(View::class);
	}
}
