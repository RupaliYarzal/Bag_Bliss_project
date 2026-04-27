@extends('admin/header')

@section('content')
    <div class="col-lg-10 stretch-card">
        <div class="card" style="box-shadow: 0 4px 10px rgba(128, 0, 128, 0.2); border-radius: 8px;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold; color: purple;">Category Table</h4>

                <div class="table-responsive pt-1">
                    <table class="table table-bordered table-hover" style="background-color: #faf5ff; border-color: #d6bbf7;">
                        <thead style="background-color: #a855f7; color: white;">
                            <tr>
                                <th style="text-align: center;">Category ID</th>
                                <th style="text-align: center;">Category Name</th>
                                <th style="text-align: center;">Category Image</th>
                                <th style="text-align: center;">Delete</th>
                                <th style="text-align: center;">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catg as $c)
                                <tr style="text-align: center;">
                                    <td>{{ $c->id }}</td>
                                    <td style="color: #6b21a8;">{{ $c->cname }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $c->cimage) }}"
                                            style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #c084fc; border-radius: 8px; box-shadow: 0 2px 6px rgba(128, 0, 128, 0.2);">
                                    </td>

                                    <td>
                                        <form action="{{ route('category.destroy', $c->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-sm"
                                                style="background-color: #d946ef; color: white; ">
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('category.edit', $c->id) }}" class="btn btn-sm"
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
