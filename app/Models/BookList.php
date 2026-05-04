<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description'];

    public function bookLogs()
    {
        return $this->belongsToMany(BookLog::class);
    }
}