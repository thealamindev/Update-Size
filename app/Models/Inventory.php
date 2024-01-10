<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class Inventory extends Model
{
    use HasFactory;

    function rel_to_size(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
