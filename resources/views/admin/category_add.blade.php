@extends('admin/header')
@section('content')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category form</h4>

                <form class="forms-sample" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Category Name:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="name" name="cname">
                    </div>

                    <div class="form-group">
                        <label for="cimage">File upload</label>
                        <input type="file" name="cimage" class="form-control" id="cimage">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
