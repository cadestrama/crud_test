<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable =[
        'movie_name',
        'image',
        'category_id'
    ];


    public static function deleteMovies(int $movieId){
        return Movie::find($movieId)->delete();
    }
    public static function getMovies(){
        return Movie::orderBy('updated_at','DESC')->get();
    }

    public static function addMovie(array $data){
        return Movie::create($data);
    }
}
