

@extends('backend.master.master')
@section('content')

    <div class="g-container">
        <main class="g-main container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <section class="g-section">
                        <div class="g-section__header">
                            <h2 class="g-section__title">Manage Privilege</h2>
                        </div>
                        <div class="g-section__content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                    <form action="{{route('add-privilege')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-xs">
                                            <label for="name">Privilege Name</label>
                                            <input type="text" name="privilege_name" id="name" class="form-control">
                                            <a href="" style="color: crimson;">{{$errors->first('privilege_name')}}</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-sm">Add Privilege</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <hr>
                                    <br>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Privilege Name</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($privilegeData as $key => $privilege)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ucfirst($privilege->privilege_name)}}</td>
                                            <td>
                                                <form action="{{route('update-privilege-status')}}" method="post">
                                                   @csrf
                                                    <input type="hidden" name="criteria" value="{{$privilege->id}}">
                                                    @if($privilege->status==1)
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
                                            <td>{{$privilege->created_at}}</td>
                                            <td>{{$privilege->updated_at}}</td>
                                            <td>
                                                <a href="{{route('edit-privilege').'/'.$privilege->id}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                                <a href="{{route('delete-privilege').'/'.$privilege->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>Delete</a>
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