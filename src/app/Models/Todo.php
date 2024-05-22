<?php

namespace App\Models;
use App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=['content'];


}
