<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class formations extends Model
{
    use HasFactory , Searchable;

    protected $fillable = ['name', 'path', 'img_name', 'desc', 'prof','price','details', 'datee'];


    public function toSearchableArray()
    {
        return [

            'desc' => $this->desc,
            'details' => $this->details,
            'img_name' => $this->img_name,
            'prof' => $this->prof,
            'datee' => $this->datee,
            'name' => $this->name
        ];
    }
}
