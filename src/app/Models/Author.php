<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'nationality'];

     public function getDetail()
  {
    $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
    return $txt;
}

public function books(){
  return $this->hasMany(Book::class);
}

//Bookモデルとのリレーション（多対多）
public function reviewedbooks(){
  return $this->belongsToMany(Book::class, table: 'reviews');
}



}
