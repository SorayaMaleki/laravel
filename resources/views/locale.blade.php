@extends('layouts.layout')
@section('title', 'locale') //send page title to main layout
        <!-- Styles -->

    @if (app()->getLocale()=="en")
        <div class="col-md-12 ">
            this page is an english page
            <a class="btn" href="{{route('locale','fa')}}">go to persian page</a>
        </div>
    @else
        <div class="col-md-12">
            این صفحه فارسی است
            <a class="btn" href="{{route('locale','en')}}">رفتن به صفحه انگلیسی</a>
        </div>
    @endif

<style>

    a{
        background: #5662bf!important;
        color: white!important;
        margin:20px;
    }
</style>