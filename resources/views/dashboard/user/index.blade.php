@extends('layouts.layout')

@section('title', 'RNV - Data User')

@section('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">User Management</h1>
<p class="mb-4">Manage users in the system</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th>Avatar</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Role</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        {{-- <th>Avatar</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Role</th> --}}
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            {{-- <td>
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="img-thumbnail" style="width: 50px;">
                                @endif
                            </td> --}}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->role }}</td> --}}
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
        return confirm('Are you sure you want to delete this user?');
    }
</script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection