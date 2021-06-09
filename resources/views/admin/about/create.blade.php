 @extends('admin.admin_master')
 
 @section('admin')

 <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create About</h2>
                </div>
                <div class="card-body">
                
                 <form action="{{ route('store.about') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">About Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="About Title">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">About Short description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis" placeholder="About Short Description"></textarea>
                        </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">About Long description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_dis" placeholder="About Long Description"></textarea>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                            <button type="submit" class="btn btn-info btn-default">Submit</button>
                           
                        </div>


                    </form>
                </div>
            </div>

 </div>
 
 
 
 
 
 
 
 
 @endsection