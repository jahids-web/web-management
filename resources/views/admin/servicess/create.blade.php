 @extends('admin.admin_master')
 
 @section('admin')

 <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Services</h2>
                </div>
                <div class="card-body">
                
                 <form action=" {{ route('store.serv') }}"method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Services Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Services Title">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Services Short description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis" placeholder="Services Short Description"></textarea>
                        </div>


                        <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                            <button type="submit" class="btn btn-info btn-default">Submit</button>
                           
                        </div>


                    </form>
                </div>
            </div>

 </div>
 
 
 
 
 
 
 
 
 @endsection