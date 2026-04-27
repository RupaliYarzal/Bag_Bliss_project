@extends('admin/header')
@section('content')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product form</h4>

                <form class="forms-sample" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                   <div class="form-group">
                        <label for="category_id">Select Category:</label>
                        <select name="catg_id" class="form-control" id="category_id" required>
                            <option value="" disabled>-- Select Category --</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}" {{ $product->catg_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->cname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Name:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="name" name="pname" value="{{$product->pname}}">
                    </div>

                    <div class="form-group">
                        <label for="pimage">Product Image:</label>
                        <input type="file" name="pimage" class="form-control" id="pimage">
                        @if($product->pimage)
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('images/' . $product->pimage) }}" alt="Current Image" width="120" height="100" style="object-fit: cover; border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Description:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="description"
                            name="desc" value="{{$product->desc}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Product Price:</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="price" name="price" value="{{$product->price}}">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="btn">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
