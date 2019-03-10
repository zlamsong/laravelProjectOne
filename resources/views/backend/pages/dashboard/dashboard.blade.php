

@extends('backend.master.master')
@section('content')



    <div class="g-container">
        <main class="g-main container-fluid">

            <div class="row">
                <div class="col-md-12">
                        @include('backend.layouts.message')
                    <section class="g-section">
                        <div class="g-section__header">
                            <h2 class="g-section__title">Dashboard</h2>
                        </div>
                        <div class="g-section__content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">Location</h3>
                                    <div id="location-map" class="jvectormap--zoom-bottom" style="height: 200px;"></div>

                                    <div class="row">
                                        <div class="col-5 d-flex align-items-center">
                                            <div class="w-100 text-center">
                                                <div><strong><big>32.6k</big></strong> views</div>
                                                <div><strong><big>12</big></strong> countries</div>
                                            </div>
                                        </div>

                                        <div class="col-7">
                                            <table class="table table-sm table-borderless">
                                                <tbody>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>33%</td>
                                                </tr>
                                                <tr>
                                                    <td>France</td>
                                                    <td>27%</td>
                                                </tr>
                                                <tr>
                                                    <td>Germany</td>
                                                    <td>16%</td>
                                                </tr>
                                                <tr>
                                                    <td>Spain</td>
                                                    <td>11%</td>
                                                </tr>
                                                <tr>
                                                    <td>Britain</td>
                                                    <td>10%</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>


    {{--<footer class="g-footer text-right">--}}
        {{--- Free Bootstrap 4 Admin Template--}}
    {{--</footer>--}}

    {{--<!-- Optional JavaScript -->--}}
    {{--<!-- jQuery first, then Popper.js, then Bootstrap JS -->--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.0/dist/umd/popper.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>--}}
    {{--<script src="{{Config::get('app.url')}}/node_modules/select2/dist/js/select2.js"></script>--}}
    {{--<script src="{{url('custom/custom.js')}}"></script>--}}






@stop