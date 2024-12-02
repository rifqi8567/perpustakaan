@extends('layouts.mazer')

@section('page-heading', 'Pendaftaran')
@section('content')

<section id="multiple-column-form">
    @if (session('successMessage'))
        <div class="alert alert-success">{{ session('successMessage') }}</div>
    @endif
    @if (session('errorMessage'))
        <div class="alert alert-danger">{{ session('errorMessage') }}</div>
    @endif
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Pendaftaran</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" class="form-control"
                                            placeholder="First Name" name="first_name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="last-name-column">Last Name</label>
                                        <input type="text" id="last_name" class="form-control"
                                            placeholder="Last Name" name="last_name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="city">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City"
                                            name="city">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="password">Password</label>
                                        <input type="text" id="password" class="form-control"
                                            name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('school')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="school">School</label>
                                        <input type="text" id="school" class="form-control"
                                            name="school" placeholder="School">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control"
                                            name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>School</th>
                            <th>Email</th>
                            @if (auth()->user() && auth()->user()->role !== 'user') 
                            <th>Aksi</th>
                            <th>Update</th>
                            @endif
                        </tr>
                    </thead>
                    @foreach ( $data as $pendaftaran)
                    <tbody>
                        <tr>
                            <td>{{($pendaftaran ->first_name)}}</td>
                            <td>{{($pendaftaran ->last_name)}}</td>
                            <td>{{($pendaftaran ->city)}}</td>
                            <td>{{($pendaftaran ->school)}}</td>
                            <td>{{($pendaftaran ->email)}}</td>
                           
                            @if (auth()->user() && auth()->user()->role !== 'user') 
                            <td>
                                <form action="{{ route('destroy.book', $pendaftaran->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                           
                            <td>
                                <!-- Tombol Edit yang mengarah ke halaman edit -->
                                <a href="{{ route('edit.book', $pendaftaran->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                            @endif
                        </tr>
                       
                    </tbody>
                    @endforeach
                    
                </table>
            </div>
        </div>
        </div>
    </div>
</section>


@endsection