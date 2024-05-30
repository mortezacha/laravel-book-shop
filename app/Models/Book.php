<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getFullImageUrlAttribute(){
        if ($this->image_url){
            return asset('storage/'.$this->image_url);
        }
        return null;
    }


}
