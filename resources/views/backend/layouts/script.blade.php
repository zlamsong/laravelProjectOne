@section('script')


    <footer class="g-footer text-right">
        - Free Bootstrap 4 Admin Template
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    {{--<script src="{{Config::get('app.url')}}/node_modules/select2/dist/js/select2.js"></script>--}}
    <script src="{{url('custom/custom.js')}}"></script>
    <script src="{{url('js/select2.min.js')}}"></script>


@endsection