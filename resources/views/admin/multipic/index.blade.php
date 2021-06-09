@extends('admin.admin_master')
 
 @section('admin')
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
        <title>Hello, world!</title>
      </head>
      <body>
        <div class="py-12">
           <div class="container">
            <div class="row">
                <div class="col-md-8 mt-5 ">
                  <div class="card">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card-header">
                     Multi Image
                    </div>
                  </div>
                {{--  --}}
                <div class="card-group">
                  @foreach($images as $multi)
                    <div class="col-md-4 mt-5">
                      <div class="card">
                       <img src="{{ asset($multi->image) }}"  alt="">
                      </div>
                    </div>
                  @endforeach
                </div>
                {{--  --}}
                </div>
                <div class="col-md-4 mt-5 ">
                  <div class="card">
                    <div class="card-header">
                     Add Image
                    </div>
                 
                  </div>
                  <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-5">
                      <label for="exampleInputEmail1" class="form-label">Multi Image</label>
                      <input type="file" class="form-control" name="image" multiple="" id="exampleInputEmail1" placeholder="Enter image" aria-describedby="emailHelp">
                      @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
 
                    <button type="submit" class="btn btn-primary mt-4">Add Multi Image</button>

                  </form>
                  
                  {{--  --}}

                </div>
               </div>
            </div>
        </div>
   
     

 
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
 
      </body>
    </html>

 @endsection