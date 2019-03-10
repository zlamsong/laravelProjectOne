<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="g-container">
    <main class="g-main container-fluid">

        <div class="row">
            <div class="col-md-12">
                <section class="g-section">
                    <div class="g-section__header">
                        <h2 class="g-section__title">Reset Password</h2>
                    </div>
                    <div class="g-section__content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('password-email')}}" method="post">
                                    @csrf
                                    <div class="form-group form-group-sm">
                                        <label for="email"> </label>
                                        <input type="email" name="email" value="" placeholder="Enter your email address" class="form-control" id="email">
                                        {{--<a href="" style="color: #d23430;">{{$errors->first('email')}}</a>--}}
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="" placeholder="Enter your email address" class="form-control" id="email">
                                        {{--<a href="" style="color: #d23430;">{{$errors->first('email')}}</a>--}}
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success">Reset password</button>
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

</body>
</html>