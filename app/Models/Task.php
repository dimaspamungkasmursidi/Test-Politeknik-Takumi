<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'deadline', 'status'];

    // Relasi ke User (Setiap tugas milik satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
