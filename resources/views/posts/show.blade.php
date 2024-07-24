@extends('layout.app')

@section('title_page')
    Show
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
<h2 class="text-center m-3" >View Information Post</h2>
<div class="container">
    <div class="card mt-4">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">Post Creator Info</div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user ? $post->user->name : "not found"}}</h5>
            <p class="card-text">Email: {{$post->user ? $post->user->email : "not found"}}</p>
            <p class="card-text">Created At: {{$post->user ? $post->user->created_at : "not found"}}</p>
        </div>
    </div>
</div>
@endsection
