<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/persianDatepicker-default.css')}}" rel="stylesheet" type="text/css" >
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/persianDatepicker.min.js')}}"></script>
        <!-- Styles -->
        <style>
            body{
                    direction: rtl;
                }
            *{
                    box-sizing: border-box
                }
            form{
                width: 500px;
                margin: 100px auto;
            }
            form input, form select{
                width: 500px;
                height:30px;
            }
            input[type="submit"]{
                width: 100px;

            }
            .formGroup{
                margin-top:20px;
            }
            #captcha img,.center{
                position:relative;
                right: 50%;
                transform: translate(50%,0%)
            }
        
            .fileUpload {
                position: relative;
                overflow: hidden;
            }
            .fileUpload input.upload {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }

            .btn--browse{
                border: 1px solid gray;
                border-right: 0;
                border-radius: 0 2px 2px 0;
                background-color: #ccc;
                color: black;
                height: 30px;
                margin-top: 15px;
                text-align: center;
                line-height: 30px;
            }

            .f-input{
                height: 30px;
                background-color: white;
                border: 1px solid gray;
                width: 100%;
                max-width: 400px;
                float: right;
                padding: 0 15px;
            }
            .errors{
                color:red;
                font-size:13px;
            }
       </style>

    </head>
    <body>
    <div class="message">
    @if (session()->has('message'))
    {{session()->get('message')}}
    @endif
    </div>
 <form enctype="multipart/form-data" method="post" action="{{route('register')}}">
     {{csrf_field()}}
     <div class="formGroup">
         <input type="text"  name="name" value="{{old('name')}}" placeholder="نام"/>
        @if ($errors->has('name'))
        <span class="errors">{{$errors->first('name')}}</span>
        @endif
</div>
     <div class="formGroup">
        <input type="text" id="birthday"  name="birthday"  value="{{old('birthday')}}" placeholder="تاریخ تولد" readonly />
        <span id="span1"></span>

        @if ($errors->has('birthday'))
        <span class="errors">{{$errors->first('birthday')}}</span>
        @endif
     </div>
     <div class="formGroup">
        <select name="major">
            <option selected="selected" disabled="disabled">مدرک تحصیلی</option>
            <option value="دیپلم" {{old('major')=="دیپلم" ? 'selected' : '' }} >دیپلم</option>
            <option value="کارشناسی" {{old('major')=="کارشناسی" ? 'selected' : '' }} >کارشناسی</option>
            <option value="کارشناسی ارشد" {{old('major')=="کارشناسی ارشد" ? 'selected' : '' }} >کارشناسی ارشد</option>
            <option value="دکترا" {{old('major')=="دکترا" ? 'selected' : '' }} >دکترا</option>
        </select>
        @if ($errors->has('major'))
        <span class="errors">{{$errors->first('major')}}</span>
        @endif
     </div>
     <div class="formGroup">
        <input id="uploadFile" class="f-input" placeholder="رزومه" />
        <div class="fileUpload btn btn--browse">
            <span>پیوست</span>
            <input id="uploadBtn" type="file" class="upload" name="resume"/>
        </div>
        @if ($errors->has('resume'))
        <span class="errors">{{$errors->first('resume')}}</span>
        @endif
     </div>
     <div class="formGroup">
        <span id="captcha">{!! captcha_img() !!}</span>
        <input type="text" name="captcha" placeholder="کدامنیتی"/>
        @if ($errors->has('captcha'))
        <span class="errors">{{$errors->first('captcha')}}</span>
        @endif
     </div>
     <div class="formGroup">
     <input  class="center" type="submit" value="ثبت نام" name="add" />
     </div>
 </form>
    </body>

</html>
<!-- javascript -->
            <script>
                document.getElementById("uploadBtn").onchange = function () {
                document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
                };
                $ (function() {
                        $("#birthday,#span1").persianDatepicker();

                })
            </script>