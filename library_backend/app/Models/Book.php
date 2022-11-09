<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'publisher', 'pages'
    ];

    protected $table = 'books';

    /**
     * Get the authors for the book.
     */
    public function authors()
    {
        return $this->hasOne(Autho::class);
    }
}
