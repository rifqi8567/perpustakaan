@extends('layouts.mazer')
@section('page-heading', 'Form Lomba')

@section('content')

<div class="container">
    @if (session('successMessage'))
    <div class="alert alert-success">{{ session('successMessage') }}</div>
@endif
@if (session('errorMessage'))
    <div class="alert alert-danger">{{ session('errorMessage') }}</div>
@endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('update.lomba', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $data->judul }}" placeholder="Masukkan Judul" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $data->subtitle }}" placeholder="Masukkan Subtitle" required>
                </div>
             
                <br>
                <div class="form-group">
                    <label for="kuotes">kuotes</label>
                    <input type="text" class="form-control" id="kuotes" name="kuotes" value="{{ $data->kuotes }}" placeholder="Masukkan kuotes" required>
                </div>
                <br>
                <div class="form-grhadiah
                    <label for="hadiah">Hadiah</label>
                    <input type="text" class="form-control" id="hadiah" name="hadiah" value="{{ $data->hadiah }}" placeholder="Masukkan hadiah" required>
                </div>
                <br>
                
                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}" placeholder="Masukkan Text" required rows="3"></textarea>
                </div>
                <br>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                </div>
                <br>
               
            </form>
        </div>
    </div>
</div>
@endsection
