@extends('layouts.layout')

@section('title', 'RNV - Data Event')

@section('style')
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Event Management</h1>
<p class="mb-4">Manage event in the system</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('event.create') }}" class="btn btn-primary">Create Event</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Organizer</th>
                        <th>Image</th>
                        <th>Tag</th>
                        <th>Harga</th>
                        <th>Awal Vote</th>
                        <th>Akhir Vote</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Organizer</th>
                        <th>Image</th>
                        <th>Tag</th>
                        <th>Harga</th>
                        <th>Awal Vote</th>
                        <th>Akhir Vote</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->organizer }}</td>
                            <td>
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="Image" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td>
                            <td>{{ $event->tag }}</td>
                            <td>Rp. {{ $event->harga_vote }}</td>
                            <td>{{ $event->awal_vote }}</td>
                            <td>{{ $event->akhir_vote }}</td>
                            <td>
                                <a href="{{ route('event.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('event.destroy', $event) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
        return confirm('Are you sure you want to delete this event?');
    }
</script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>
@endsection