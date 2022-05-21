<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','status','created_at','updated_at'];
    /**
     * The roles that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function borrow()
    {
        return $this->belongsToMany(Book::class, 'borrow_detail', 'book_id', 'borrow_id');
    }

    /**
     * Get the user associated with the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rfid()
    {
        return $this->hasOne(RfidTag::class, 'book_id', 'id');
    }
}
