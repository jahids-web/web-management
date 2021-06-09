 @extends('admin.admin_master')
 
 @section('admin')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
         
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profie Update</h2>
        </div>
            @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
               @endif
               {{-- message --}}
        <div class="card-body">
            <form method="POST" action="{{ route('update.user.profie') }}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                 <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                 
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            
            </form>
        </div>
    </div>
        </div>
    </div>
</div>













 @endsection