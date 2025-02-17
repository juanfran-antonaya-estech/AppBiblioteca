<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'release_year',
        'status',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'release_year' => 'integer',
            'status' => 'boolean',
        ];
    }
}
