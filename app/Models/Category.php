<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
    ];

    public static function getCategory(){
        return Category::orderBy('name','ASC')->get();
    }

    public static function deleteCategory(int $id){
        return Category::find($id)->delete();
    }


    public static function addCategory(array $data){
        return Category::create($data);
    }


    public static function allCategory(){
        return Category::orderBy('updated_at','DESC')->get();
    }
}
