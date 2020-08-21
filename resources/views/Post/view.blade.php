@extends('Post.layouts.main')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YoungMinds Task</title>

    </head>
    <body>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                        <div class="card card-box">
                            <div class="card-head">
                                <h1 class="text-center">YoungMinds Task</h1>

                            </div>

                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <div class="btn-group">
                                        <a class="btn btn-primary" style="margin-right: 10px;" href="{{ route('post.create') }}">Add +</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-scrollable">
                                    <table class="table table-dark" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($post as $key=>$posts)
                                            <tr>
                                                <th>{{$key+1}}</th>
                                                <td>{{$posts->title}}</td>
                                                <td><img src="{{asset('images/'.$posts->image)}}"
                                                         alt="Post image" width="auto" height="60px"></td>
                                                <td>{{$posts->content}}</td>
                                                <td class="text-left">
                                                    <form action="{{route('post.edit', $posts->id)}}" method="GET" style="display: inline-block">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                                    </form>

                                                    <form action="{{ route('post.destroy', $posts->id)}}" method="post" style="display: inline-block">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </body>
</html>
