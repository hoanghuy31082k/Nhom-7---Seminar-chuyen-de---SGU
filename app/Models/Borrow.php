<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','begindate','enddate','returndate','created_at','updated_at'];
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    /**
     * The roles that belong to the Borrow
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function book()
    {
        return $this->belongsToMany(Book::class, 'borrow_detail', 'borrow_id', 'book_id');
    }
}