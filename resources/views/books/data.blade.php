@extends('layouts.mazer')

@section('page-heading', 'Buku-Buku Islamic')
@section('content')

<section>
    <div class="container">
        <div class="col-12">
            @if (session('successMessage'))
            <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif
        @if (session('errorMessage'))
            <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif
    
            <div class="d-flex flex-row flex-wrap gap-5">
  
          @foreach ($data as $data)
              
          
            <div class="card" style="width: 23rem;">
                <img src="{{asset('storage/'. $data->upload_gambar)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Judul : {{$data->judul_buku}}</h5>
                  <p class="card-text">Penerbit : {{ $data->nama_penerbit }}</p>
                  <p class="card-text">Tahun : {{ $data->tahun_diterbitkan }}</p>
                  <p class="card-text">Jumlah Halaman : {{ $data->jumlah_halaman }}</p>
                  {{-- <p class="card-text">File : {{ $data->upload_file }}</p> --}}
                  <a href="{{route('detail.buku', $data->id)}}" class="btn btn-primary">Open</a>
                  <br><br>
                  @if (auth()->user() && auth()->user()->role !== 'user') 
                  <form action="{{ route('create.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                        Hapus
                    </button>
                </form>

                <br>
                <div class="container">
                    <div class="col-12">
                        <div class="d-flex flex-row flex-wrap gap-5">
                            <!-- Link ke halaman edit -->
                            <a href="{{ route('edit.buku', $data->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
                
                 @endif
                 


                </div>
            </div>
            @endforeach
        </div>
      </div>  
  </div>
</section>

     
@endsection