 @extends('admin.admin_master')
 
 @section('admin')

 <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Service</h2>
                </div>
                <div class="card-body">
                
                 <form action="{{ url('update/services/'.$homeserv->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Service Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $homeserv->title }}" id="exampleFormControlInput1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> Service description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis">{{ $homeserv->short_dis }}</textarea>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                            <button type="submit" class="btn btn-info btn-default">Update</button>
                           
                        </div>


                    </form>
                </div>
            </div>

 </div>
 
 
 
 
 
 
 
 
 @endsection