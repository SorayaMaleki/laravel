@extends('layouts.layout')
@section('title', 'pagination') //send page title to main layout
<table border="1">
    <thead>
    <tr>
        <th>شماره</th>
        <th>عنوان</th>
        <th>متن</th>
        <th>تاریخ ایجاد</th>
    </tr>
    </thead>

    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<div class="text-center">
    {{$posts->links()}}
    {{ $posts->onEachSide(1)->links() }}
    {{$posts->fragment('td')->links()}}
    {{$posts->appends(['name'=>'sorays'])->links()}}
    {{$posts->appends(request()->query())->links()}}
</div>
