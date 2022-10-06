<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;

class AdminController extends Controller
{
    public function index(){

        

        return view('admin.admin',[
            'category' => Category::allCategory(),
            'listCategory' => Category::getCategory(),
            'movies' => Movie::getMovies(),
        ]);
    }


    public function deleteMovie(int $movieId){

        Movie::deleteMovies($movieId);

        session()->flash('deletemovie', 'successfully deleted a movie');
        return redirect()->route('showadmin');
    }


    public function addMovie(Request $request){

        $validated = $request->validate([
            'movie_name' => 'required| unique:movies',
            'image' => 'required |image',
        ]);

        $imagePath = request('image')->store('movie_images','public');

        $data = [
            'movie_name' => $validated['movie_name'],
            'image' => $imagePath,
            'category_id' => $request['category']
        ];


        Movie::addMovie($data);

        session()->flash('addmovie', 'successfully added a movie');
        return redirect()->route('showadmin');
        

    }


    public function deleteCategory (int $categoryId){
        
        Category::deleteCategory($categoryId);

        session()->flash('deletecat', 'successfully deleted a category');
        return redirect()->route('showadmin');
    }

    public function addCategory(Request $request){

    $validated = $request->validate([
            'name' => 'required | unique:categories',
        ]);


       //add

       $data =[
        'name' => $request['name']
       ];


       Category::addCategory($data);

       session()->flash('addcat', 'add new category successfully!');
       return redirect()->route('showadmin');
    }
}
