@extends('admin.admin_master')
 
 @section('admin')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="py-12">
        <div class="container">
               
                <h5 class="font-semibold text-xl fw-bold text-gray-800 ">

                Hi.. <b> {{ Auth::user()->name }}</b>
                <b style="float:right;"> Total Users
                    <span class="badge badge-danger">{{ count($users) }}</span>
                </b>

                </h5>

              <div class="row mt-5">
                <div class="col-md-12 m-auto">
                    <table class="table table-striped">
                         <caption>List of users</caption>
                        <thead>
                            <tr>
                            <th scope="col">id.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date Time</th>
                            </tr>
                        </thead>

                        <tbody>
                        @php($i = 1) 
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
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

 @endsection