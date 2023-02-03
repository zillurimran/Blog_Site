@extends('admin.master')
@section('title')
    Add Category
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Category</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('new.category') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category_name" id="inputEnterYourName" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Manage Category</h5>

                        </div>
                        <hr/>
                       <table class="table table-bordered table-striped">
                           <thead>

                               <tr>
                                   <th>Sl</th>
                                   <th>category Name</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>

                           </thead>
                           <tbody>
                           @php $i=1 @endphp
                           @foreach($categories as $category)
                               <tr>
                                   <td>{{$i++}}</td>
                                   <td>{{$category->category_name}}</td>
                                   <td>{{$category->status ==1 ? 'Published' : "Unpublished"}}</td>
                                   <td class="d-flex">
                                       <a href="{{ route('edit.category',['id'=>$category->id]) }}" class="btn btn-primary btn-sm">Edit</a>

                                       <form action="{{ route('delete.category') }}" method="post">
                                           @csrf
                                           <input type="hidden" name="category_id" value="{{$category->id}}">
                                           <input type="submit" class="btn btn-danger btn-sm mx-1" value="Delete">
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
