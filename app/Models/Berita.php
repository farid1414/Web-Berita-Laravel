<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Illuminate\Support\Carbon;

class Berita extends Model
{
    use SoftDeletes;
    protected $table='news';
    protected $fillable=['title', 'slug', 'image', 'topic','content', 'users_id', 'tags'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }
    public function getNow()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }
}