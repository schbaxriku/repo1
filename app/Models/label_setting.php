<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class label_setting extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'language_id',
      'label_name',
      'label_value',
  ];
}
