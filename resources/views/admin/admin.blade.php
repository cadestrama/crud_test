<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <div class="container">
        <div class="w-auto m-auto flex items-center justify-center">
            <p>Manage movie</p>
        </div>

        <div>
            @if(session('addcat'))
            <div class="alert alert-success">
                {{ session('addcat')}}
            </div>
        @endif

        @if(session('deletecat'))
        <div class="alert alert-success">
            {{ session('deletecat')}}
        </div>
        @endif

        @if(session('addmovie'))
        <div class="alert alert-success">
            {{ session('addmovie')}}
        </div>
        @endif


         @if(session('deletemovie'))
        <div class="alert alert-success">
            {{ session('deletemovie')}}
        </div>
        @endif



        

        </div>
       
    </div>

    <div class="container mt-5 flex item-center justify-center space-x-2">

        <div>
            <div class="card">
                <div class="card-header">Add Movie</div>

                <div class="card-body">

                    <form method="POST" action="{{route('addmovie')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                        <label for="name" class="form-label">Movie Name: </label>

                        <input type="text" name="movie_name" class="form-control">

                        @error('movie_name')
                       <div class="alert alert-danger mt-2" role="alert">
                        <p>{{$message}}</p>
                      </div>
                       @enderror
    

                        </div>

                        <div>
                            <label for="image">Movie Mock-up:</label>
                        <input type="file" name="image" class="form-control">

                        @error('image')
                        <div class="alert alert-danger mt-2" role="alert">
                         <p>{{$message}}</p>
                       </div>
                        @enderror
                        </div>

                        <div class="mt-2">
                            <label for="category">Category:</label>
                            <select class="form-select" name="category" aria-label="Default select example">
                            
                                @foreach ($listCategory as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        

                        <input type="submit" class="py-2 px-3 bg-lime-500 mt-3" value="Add">
                    </form>
                   
                  
                </div>
            </div>
        </div>


        <div>
            <div class="card">
                <div class="card-header">
                    List of Movies
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Mockup</th>
                            <th scope="col">Action</th>
            
                          </tr>
                        </thead>
                        <tbody>

                         @foreach ($movies as $movie )
                         <tr>
                            <th scope="row">{{$movie->id}}</th>
                            <td>{{$movie->movie_name}}</td>
                            <td>{{$movie->category->name}}</td>
                            <td><img src="/storage/{{$movie->image}}" class="w-20" alt=""></td>
                            <td>
                        
                                <a href="{{route('deletemovie',['id'=> $movie->id])}}" class="btn btn-danger">Delete</a></td>
                          </tr> 
                         @endforeach
                          
                         
                        </tbody>
                      </table>

                </div>
            </div>
        </div>



        {{-- category --}}

        <div>

            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
    
                    <form action="{{route('addcategory')}}" method="POST">
                        @csrf
                        <div>
                            <label for="category" class="form-input">Category Name</label>
                            <input type="text" class="form-control" name="name" id="category">
                            
                       
                       @error('name')
                       <div class="alert alert-danger mt-2" role="alert">
                        <p>{{$message}}</p>
                      </div>
                           
                       @enderror
    
                           
                        </div>
                        
                        <input type="submit" class="py-2 px-3 bg-lime-500 mt-3" value="Add">

                    </form>
                    
                </div>
            </div>

        </div>

        <div>
            <div class="card">
                <div class="card-header">List of categories</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
            
                          </tr>
                        </thead>
                        <tbody>

                         @foreach ($category as $cat )
                         <tr>
                            <th scope="row">{{$cat->id}}</th>
                            <td>{{$cat->name}}</td>
                            <td>
                        
                                <a href="{{route('deletecategory',['id'=> $cat->id])}}" class="btn btn-danger">Delete</a></td>
                          </tr> 
                         @endforeach
                          
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>


       
       

    </div>
   
    
</body>
</html>