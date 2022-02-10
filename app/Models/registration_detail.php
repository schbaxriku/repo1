<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration_detail extends Model
{
    use HasFactory;

    protected $fillable = [

     'id',
     'user_id',
     'registration_type',
     'registration_no',
     'effective_date',
     'certificate_image',
     

            ];
}
