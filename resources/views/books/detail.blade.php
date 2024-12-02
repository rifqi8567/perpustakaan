@extends('layouts.mazer')

@section('page-heading', 'Detail Buku')
@section('content')


<h1>{{$data->judul_buku }}</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5>Judul : {{$data->judul_buku }}</h5>
            <h5>Nama Penerbit : {{$data->nama_penerbit }}</h5>
            <h5>Tahun Diterbitkan: {{$data->tahun_diterbitkan }}</h5>
            <h5>Jumlah Halaman : {{$data->jumlah_halaman }}</h5>
     <h5>
    <a href="{{ $data->upload_file }}" target="_blank" rel="noopener noreferrer" style="color: blue; text-decoration: underline;">
        Klik di sini untuk membuka file
    </a>
</h5>

        </div>
    </div>
</div>


@endsection