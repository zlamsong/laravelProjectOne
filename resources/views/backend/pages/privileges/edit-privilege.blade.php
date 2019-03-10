

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
                                    <form action="{{route('edit-privilege-action')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$privilegeData->id}}">
                                        <div class="form-group form-group-xs">
                                            <label for="name">Privilege Name</label>
                                            <input type="text" name="privilege_name" value="{{$privilegeData->privilege_name}}" id="name" class="form-control">
                                            <a href="" style="color: crimson;">{{$errors->first('privilege_name')}}</a>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-sm">Update Privilege</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>





@stop