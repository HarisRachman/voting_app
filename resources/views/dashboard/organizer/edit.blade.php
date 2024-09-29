@extends('layouts.layout')

@section('title', 'RNV - Edit Data Organizer')

@section('content')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Edit Organizer Data</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('organizer.update', $organizer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $organizer->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                @if($organizer->logo)
                                    <div id="existing-logo" style="margin-top:-25px">
                                        <br>
                                        <img src="{{ asset('storage/' . $organizer->logo) }}" alt="Logo" class="img-thumbnail" style="width: 150px;">
                                        <br><br>
                                    </div>
                                @endif
                                <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" onchange="previewLogo(event)">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <img id="logo-preview" src="#" alt="Logo Preview" class="img-thumbnail" style="display: none; width: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="5">{{ $organizer->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner">Banner</label>
                                @if($organizer->banner)
                                    <div id="existing-banner" style="margin-top:-25px">
                                        <br>
                                        <img src="{{ asset('storage/' . $organizer->banner) }}" alt="Banner" class="img-thumbnail" style="width: 150px;">
                                        <br><br>
                                    </div>
                                @endif
                                <input type="file" name="banner" id="banner" class="form-control @error('banner') is-invalid @enderror" onchange="previewBanner(event)">
                                @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <img id="banner-preview" src="#" alt="Banner Preview" class="img-thumbnail" style="display: none; width: 150px;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        
    </div>
</div>
@endsection

@section('script')
<script>
    function previewLogo(event) {
        var input = event.target;
        var preview = document.getElementById('logo-preview');
        var preview2 = document.getElementById('existing-logo');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                preview2.style.display = 'none';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

<script>
    function previewBanner(event) {
        var input = event.target;
        var preview = document.getElementById('banner-preview');
        var preview2 = document.getElementById('existing-banner');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                preview2.style.display = 'none';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection