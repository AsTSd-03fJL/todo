<?php

namespace App\Models;
use App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=['category_id','content'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query,$category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }

    public function scopeKeywordSeach($query,$keyword){
        if(!empty($keyword)){
            $query->where('content','like','%'.keyword.'%');
        }
    }

}
