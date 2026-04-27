@extends('admin/header')

@section('content')
    <div class="col-lg-10 stretch-card">
        <div class="card" style="box-shadow: 0 4px 10px rgba(128, 0, 128, 0.2); border-radius: 8px;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold; color: purple;">Product Table</h4>

                <div class="table-responsive pt-1">
                    <table class="table table-bordered table-hover" style="background-color: #faf5ff; border-color: #d6bbf7;">
                        <thead style="background-color: #a855f7; color: white;">
                            <tr>
                                <th style="text-align: center;">Category Id</th>
                                <th style="text-align: center;">Product Id</th>
                                <th style="text-align: center;">Product Name</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Price</th>
                                <th style="text-align: center;">Delete</th>
                                <th style="text-align: center;">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $p)
                                <tr style="text-align: center;">
                                    <td>{{ $p->catg_id }}</td>
                                    <td>{{ $p->id }}</td>
                                    <td style="color: #6b21a8;">{{ $p->pname }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $p->pimage) }}"
                                            style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #c084fc; border-radius: 8px; box-shadow: 0 2px 6px rgba(128, 0, 128, 0.2);">
                                    </td>
                                    <td style="color: #6b21a8;padding:0px;">{{ $p->desc }}</td>
                                    <td style="color: #6b21a8;">{{ $p->price }}</td>
                                    <td>
                                        <form action="{{ route('product.destroy', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-sm"
                                                style="background-color: #d946ef; color: white; ">
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('product.edit', $p->id) }}" class="btn btn-sm"
                                            style="background-color: #9333ea; color: white;">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
