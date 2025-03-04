<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'birth_date',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }
}
