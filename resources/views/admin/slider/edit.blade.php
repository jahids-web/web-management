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
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-auto mt-5">
                  <div class="card">
                    <div class="card-header">
                      Edit Slider
                    </div>
                  </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                    @endif
                  <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $sliders->image }}">

                    <div class="mt-5">
                      <label for="exampleInputEmail1" class="form-label">Update Slider  title</label>
                      <input type="text" class="form-control" name="title" value="{{ $sliders->title }}" id="exampleInputEmail1" placeholder="Enter title Name" aria-describedby="emailHelp">
                      @error('title')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                      <div class="mt-5">
                      <label for="exampleInputEmail1" class="form-label">Update Slider  description</label>
                      <input type="text" class="form-control" name="description" value="{{ $sliders->description }}" id="exampleInputEmail1" placeholder="Enter description Name" aria-describedby="emailHelp">
                      @error('description')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                     <div class="mt-5">
                      <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
                      <input type="file" class="form-control" name="image" value="{{ $sliders->image }}" id="exampleInputEmail1" placeholder="Enter Category Name" aria-describedby="emailHelp">
                      
                      @error('image')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group mt-5">
                        <img src="{{ asset($sliders->image) }}" style="width: 300px; height:200px" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update Slider</button>
                  </form>
                  {{--  --}}

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
