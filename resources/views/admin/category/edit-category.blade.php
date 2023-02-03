@extends('admin.master')
@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Edit Category</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('update.category') }}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" id="inputEnterYourName" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
