<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                {{--                @if(auth()->user()->id==1)--}}
                {{--                    سلام یوزر1--}}
                {{--                @elseif(auth()->user()->id==2)--}}
                {{--                    سلام یوزر2--}}
                {{--                @endif--}}

                @can('is-admin')
                    شما ادمین اید
                @else
                    شما ادمین نیستید
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>




