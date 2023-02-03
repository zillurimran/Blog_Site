@extends('admin.master')
@section('title')
    Manage Blogs
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded table-responsive">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Manage Blogs</h5>

                        </div>
                        <hr/>
                        <table id="example" class="table table-bordered">
                            <thead>

                            <tr>
                                <th>Sl</th>
                                <th>category Name</th>
                                <th>Author Name</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Blog Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$blog->category_name}}</td>
                                        <td>{{$blog->author_name}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->slug}}</td>
                                        <td>{{substr($blog->description,0,100)}}</td>
                                        <td>
                                            <img src="{{asset($blog->image)}}" alt="" width="100px" height="100px">
                                        </td>
                                        <td>{{$blog->date}}</td>
                                        <td>{{$blog->blog_type}}</td>
                                        <td>{{$blog->status ==1 ? 'Published' : "Unpublished"}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('edit.blog',['id'=>$blog->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            @if($blog->status==1)
                                                <a href="{{route('status',['id'=>$blog->id])}}" class="btn-warning btn btn-sm mx-2">Unpublished</a>
                                            @else
                                                <a href="{{route('status',['id'=>$blog->id])}}" class="btn-success btn btn-sm mx-2">Published</a>
                                                @endif

                                            <form action="{{route('delete.blog')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                                <button type="submit"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</button>
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
@endsection
