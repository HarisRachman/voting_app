@extends('layouts.layout')

@section('title', 'RNV - Data Vote')

@section('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Payment Management</h1>
<p class="mb-4">Manage payment in the system</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('obats.create') }}" class="btn btn-primary">Create Payment</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Event</th>
                        <th>Nama Voter</th>
                        <th>Nama Kandidat</th>
                        <th>Total Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Event</th>
                        <th>Nama Voter</th>
                        <th>Nama Kandidat</th>
                        <th>Total Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($obats as $obat)
                        <tr>
                            <td>
                                @if($obat->image)
                                    <img src="{{ asset('storage/' . $obat->image) }}" alt="Image" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td>
                            <td>{{ $obat->nama }}</td>
                            <td>Rp. {{ $obat->harga }}</td>
                            <td>{{ $obat->keterangan }}</td>
                            <td>
                                <a href="{{ route('obats.edit', $obat) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('obats.destroy', $obat) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this payment?');
    }
</script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection