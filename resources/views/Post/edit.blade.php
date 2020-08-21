@extends('Post.layouts.main')

<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <h1 class="text-center">Edit Post</h1>
                        </div>

                        <div class="card-body " id="bar-parent">
                        <form class="container center_div" method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control"
                                               placeholder="Enter Title" name="title" value="{{@$post->title}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                         <input type="hidden" name="image">
                                                @if($post->image != null)
                                                    <img src="{{asset('images/' .$post->image)}}"
                                                         alt="Post image" height="100px" width="auto">
                                                @endif
                                            <input type="file" class="form-control-file" id="image"
                                                   name="image">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control"  rows="3"  placeholder="Enter Content" name="content" required>{{@$post->content}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                    <a href="{{ route('post.index') }}" class="btn btn-danger">View All</a>
                                </div>
                        </form>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
