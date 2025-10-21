<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'author_id' => 'required',
        'title' => 'required',
    );

    public function getTitle(){
        return 'ID'.$this->id . ':' . $this->title;
    }

    // Authorモデルとのリレーション（多対1）
public function author()
{
    return $this->belongsTo(Author::class);
}


}
