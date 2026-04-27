@extends('admin/header')

@section('content')
    <div class="container mt-4">
        <h2 style="color: rgb(132, 79, 193);">Users with Orders</h2>
        <table class="table mt-3" style="border: 2px solid purple;">
            <thead style="background-color: #f5e6ff; color: purple;">
                <tr>
                    <th style="border: 1px solid purple;">First Name</th>
                    <th style="border: 1px solid purple;">Last Name</th>
                    <th style="border: 1px solid purple;">Email</th>
                    <th style="border: 1px solid purple;">Orders</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td style="border: 1px solid purple;">{{ $user->first_name }}</td>
                        <td style="border: 1px solid purple;">{{ $user->last_name }}</td>
                        <td style="border: 1px solid purple;">{{ $user->email }}</td>
                        <td style="border: 1px solid purple;">
                            <a href="{{ url('user-orders/' . urlencode($user->email)) }}"
                                class="btn btn-sm btn-outline-purple" style="color: purple; border: 1px solid purple;">
                                View Orders
                            </a>
                        </td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
