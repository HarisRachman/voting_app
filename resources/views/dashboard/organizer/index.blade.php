@extends('layouts.layout')

@section('title', 'RNV - Data Organizer')

@section('style')
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Organizer Management</h1>
<p class="mb-4">Manage organizer in the system</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('organizer.create') }}" class="btn btn-primary">Create Organizer</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Banner</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Banner</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($organizers as $org)
                        <tr>
                            <td>{{ $org->nama }}</td>
                            <td>
                                @if($org->logo)
                                    <img src="{{ asset('storage/' . $org->logo) }}" alt="Logo" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td>
                            <td>
                                @if($org->banner)
                                    <img src="{{ asset('storage/' . $org->banner) }}" alt="Banner" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td>
                            <td>{{ $org->deskripsi }}</td>
                            <td>
                                <a href="{{ route('organizer.edit', $org) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('organizer.destroy', $org) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
<script src="{{asset('dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this organizer?');
    }
</script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>
@endsection