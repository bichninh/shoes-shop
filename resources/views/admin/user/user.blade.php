@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-md-12" >
       <a href="{{URL::to('/add_user')}}" class="btn btn-success float-right" >+ ADD</a>
    </div>
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             Danh sách người dùng
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">ID</th>
                              <th scope="col">UserName</th>
                              <th scope="col">Email</th>
                              <th scope="col">Password</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                              <th scope="col">Create_At</th>
                              <th scope="col">Action</th>
                           </tr>
                       </thead>
                        <tbody>
                            @foreach($users as  $user)
                            <tr>
                              <th >{{$user->id}}</th>
                              <td>{{$user->username}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->password}}</td>
                              <td>{{$user->phone}}</td>
                              <td>{{$user->address}}</td>
                              <td>{{$user->created_at}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat' ><i class='fa fa-edit'></i> <a  href="{{URL::to('/edit-user/'.$user->id)}}" >Edit</a></button>
                              <button  class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-user/'.$user->id)}}"> Delete</a></button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center">{{$users->links()}}</div>

          </div>
          
     </section>
     </div>
</div>
@endsection