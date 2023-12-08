<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable ;

class Brand extends Model
{
    use HasFactory , Searchable ;

    public function searchableAS ( ) :string {
        return "mypost_index" ;
    }
}
