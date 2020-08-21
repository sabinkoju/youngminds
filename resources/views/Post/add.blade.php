@extends('Post.layouts.main')

<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <h1 class="text-center">Add New Post</h1>
                        </div>

                        <div class="card-body " id="bar-parent">
                        <form class="container center_div" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control"
                                               placeholder="Enter Title" name="title" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                         <input type="hidden" name="image">
                                            <input type="file" class="form-control-file" id="image"
                                                   name="image" required="" multiple>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Content</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Enter Content" name="content" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add New Post</button>
                                    <a href="{{ route('post.index') }}" class="btn btn-danger">View All</a>
                                </div>
                        </form>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
