 @extends('admin.admin_master')
 
 @section('admin')

 <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Contact</h2>
                </div>
                <div class="card-body">
                
                 <form action="{{ route('store.contact') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Email</label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Contact Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Phone</label>
                            <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Contact phone">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contact Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" placeholder="Contact Adress"></textarea>
                        </div>

                   

                        <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                            <button type="submit" class="btn btn-info btn-default">Submit</button>
                           
                        </div>


                    </form>
                </div>
            </div>

 </div>
 
 
 
 
 
 
 
 
 @endsection