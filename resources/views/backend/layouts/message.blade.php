@if(Session('success'))
    <div class="alert alert-success">
        <i class="glyphicon glyphicon-check"></i>
        {{Session('success')}}
    </div>
@endif

@if(Session('error'))
    <div class="alert alert-danger">
        <i class="glyphicon glyphicon-time"></i>
        {{Session('error')}}
    </div>
@endif
