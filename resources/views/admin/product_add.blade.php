@extends('admin/header')
@section('content')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product form</h4>

                <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Select Category:</label>
                        <select name="catg_id" class="form-control" id="category_id" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cname }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Name:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="name" name="pname">
                    </div>

                    <div class="form-group">
                        <label for="pimage">File upload</label>
                        <input type="file" name="pimage" class="form-control" id="pimage">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Description:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="description"
                            name="desc">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Price:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="price" name="price">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
