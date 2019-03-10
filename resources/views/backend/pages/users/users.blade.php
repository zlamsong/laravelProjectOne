

@extends('backend.master.master')
@section('content')


    <div class="g-container">
        <main class="g-main container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <section class="g-section">
                        <div class="g-section__header">
                            <h2 class="g-section__title">Users</h2>
                        </div>
                        <div class="g-section__content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Privilege Name</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($adminsData as $key=>$admin)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->username}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>
                                                @foreach($admin->privilege as $pri)
                                                    <span class="btn btn-info btn-sm">
                                                           {{$pri->privilege_name}}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{route('update-user-status')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="criteria" value="{{$admin->id}}">
                                                    @if($admin->status==1)
                                                        <button class="btn btn-success btn-xs" name="active">active
                                                            {{--<i class="fa fa-check"></i>--}}
                                                        </button>
                                                    @else
                                                        <button class="btn btn-warning btn-xs" name="inactive">inactive
                                                            {{--<i class="fa fa-times"></i>--}}
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <img src="{{url('lib/uploads/users/'.$admin->image)}}" class="g-header__profile-photo rounded-circle" style="height: 50px; width: 50px; float: left;  margin-left: 5px; border-radius: 50%;">
                                            </td>
                                            <td>
                                                <a href="{{route('edit-user').'/'.$admin->id}}" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="{{route('delete-user').'/'.$admin->id}}" onclick="return confirm('are you sure to delete?')"}} class="btn btn-danger btn-xs" ">Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>






@stop