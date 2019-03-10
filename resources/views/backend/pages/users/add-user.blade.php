

@extends('backend.master.master')
@section('content')

<div class="g-container">
    <main class="g-main container-fluid">

        <div class="row">
            <div class="col-md-12">
                <section class="g-section">
                    <div class="g-section__header">
                        <h2 class="g-section__title">Add Users</h2>
                    </div>
                    <div class="g-section__content">
                        <div class="row">
                            <div class="col-md-10">
                                @include('backend.layouts.message')
                                <form action="{{route('add-user')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-group-sm">
                                        <label for="privilege">Privilege</label>
                                        <select name="privilege[]" multiple="multiple" class="form-control" id="privilege-id">
                                            @foreach($privilegeData as $privilege)
                                                <option value="{{$privilege->id}}">{{$privilege->privilege_name}}</option>
                                            @endforeach
                                        </select>
                                        <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" placeholder="Enter your name" class="form-control" id="name">
                                        <a href="" style="color: #d23430;">{{$errors->first('name')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" value="{{old('username')}}" placeholder="Enter your username" class="form-control" id="username">
                                        <a href="" style="color: #d23430;">{{$errors->first('username')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="Enter your email address" class="form-control" id="email">
                                        <a href="" style="color: #d23430;">{{$errors->first('email')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" placeholder="Enter your password" class="form-control" id="password">
                                        <a href="" style="color: #d23430;">{{$errors->first('password')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="password_confirmation">Password Confirm</label>
                                        <input type="password" name="password_confirmation" placeholder="Enter your password again" class="form-control" id="password_confirmation">
                                        <a href="" style="color: #d23430;">{{$errors->first('password_confirmation')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="upload">Profile picture</label>
                                        <input type="file" name="upload" class="btn btn-default btn-sm" id="change_image">
                                        <a href="" style="color: #d23430;">{{$errors->first('upload')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                      <button class="btn btn-success">Add record</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <img src="{{url('svg/noimage.jpg')}}" id="target_image" alt="" class="g-header__profile-photo rounded-circle" style="height: 150px; width: 155px; float: left;  margin-left: 5px; border-radius: 50%; margin-top: 30px;">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>




@stop