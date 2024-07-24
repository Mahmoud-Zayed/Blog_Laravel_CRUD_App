@extends('layout.app')

@section('title_page')
Edit
@endsection

@section('nav_btn')
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">All Posts</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h2 class="text-center m-3" >Edit & Update Information Post</h2>
    <form method="POST" action="{{route('posts.update', $post->id)}}" class="mt-3">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label class="form-label" for="">Title</label>
            <input name="title" type="text" class="form-control" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Description</label>
            <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Post Creator</label>
            <select name="post_creator" class="form-control" name="" id="">
                @foreach ($users as $user)
                    <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection