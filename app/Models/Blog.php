<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $filiable = ['title', 'slug', 'intro', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query) use ($filters) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
                    ->orwhere('body', 'LIKE', '%' . $filters['search'] . '%')
                    ->paginate(3);
            });
        })
            // filter by user
            ->when($filters['username'] ?? null, function ($query) use ($filters) {
                $query->wherehas('user', function ($query) use ($filters) {
                    $query->where('username', $filters['username']);
                });
            })
            // filter by category
            ->when($filters['category'] ?? null, function ($query) use ($filters) {
                $query->wherehas('category', function ($query) use ($filters) {
                    $query->where('id', $filters['category']);
                });
            });
    }
}
