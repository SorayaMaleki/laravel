<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<?php
    $style=[
        'h1'=>'text-align: center;background: #072256;color: white;padding: 5px;',
        'body'=>'direction:rtl;',
        'img'=>'width:150px;height: 150px;',
        'center'=>'text-align: center;'
        ]
?>
<body style="{{$style['body']}}">
<h1 style="{{$style['h1']}}">ایمیل ارسالی از لاراول</h1>
<h3>
    سلام
{{$name}}
</h3>
<p >
    این ایمیل جهت تست ارسال ایمیل در لاراول ارسال شده است
</p>
<div style="{{$style['center']}}">
    <img style="{{$style['img']}}" src="{{$message->embed(storage_path('app/public/august-1__800_800.jpg'))}}">
</div>
<hr>
<span>{{$date}}</span>
</body>
</html>

