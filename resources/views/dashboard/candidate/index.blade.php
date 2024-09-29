@extends('layouts.layout')

@section('title', 'RNV - Data Candidate')

@section('style')
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Candidate Management</h1>
<p class="mb-4">Manage candidate in the system</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('candidate.create') }}" class="btn btn-primary">Create Candidate</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Nama</th>
                        <th>Image</th>
                        <th>Usia</th>
                        <th>Daerah</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Event</th>
                        <th>Nama</th>
                        <th>Image</th>
                        <th>Usia</th>
                        <th>Daerah</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($candidates as $cand)
                        <tr>
                            <td>{{ $cand->event }}</td>
                            <td>{{ $cand->nama }}</td>
                            <td>
                                @if($cand->image)
                                    <img src="{{ asset('storage/' . $cand->image) }}" alt="Image" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td>
                            <td>{{ $cand->usia }} Tahun</td>
                            <td>{{ $cand->daerah }}</td>
                            <td>
                                <a href="{{ route('candidate.edit', $cand) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('candidate.destroy', $cand) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
        return confirm('Are you sure you want to delete this candidate?');
    }
</script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>
@endsection