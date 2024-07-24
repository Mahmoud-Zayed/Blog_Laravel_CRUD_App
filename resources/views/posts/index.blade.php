
@extends('layout.app')

@section('title_page')
Index
@endsection

@section('content')
<div class="m-4">
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    </div>
</div>

<div class="container">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : "not found"}}</td>
                    <td>{{$post->created_at->format("Y-m-d")}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info m-1">view</a>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary m-1">Edit</a>
                        <form style="display: inline" method="POST" action="{{route('posts.destroy', $post->id)}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection