@extends('admin/header')
@section('content')
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Inward Entry Form</h4>

                <form class="forms-sample" action="{{ route('inword.store') }}" method="POST" >
                    @csrf

                    <div class="form-group">
                        <label for="product_id">Select Product:</label>
                        <select name="pid" class="form-control" id="product_id" required>
                            <option value="" disabled selected>-- Select Product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->pname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="qty" placeholder="Enter quantity" required min="1">
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required min="1">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
