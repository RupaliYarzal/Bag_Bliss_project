@extends('admin/header')

@section('content')
    <div class="col-lg-10 stretch-card">
        <div class="card" style="box-shadow: 0 4px 10px rgba(128, 0, 128, 0.15); border-radius: 10px;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: 600; color: #6b21a8;">inword Stock Overview</h4>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive pt-2">
                    <table class="table table-bordered table-hover" style="background-color: #f8f5ff; border-color: #e9d5ff;">
                        <thead style="background-color: #9333ea; color: white;">
                            <tr>
                                <th class="text-center">inword Id</th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Date Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inwords as $inword)
                                <tr>
                                    <td class="text-center">{{ $inword->id }}</td>
                                    <td class="text-center" style="color: #5b21b6;">
                                        {{ $inword->product->id ?? 'N/A' }}
                                    </td>
                                    <td class="text-center" style="color: #5b21b6;">{{ $inword->qty }}</td>
                                    <td class="text-center" style="color: #5b21b6;">
                                        {{ $inword->created_at->format('d M, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No inword entries found yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
