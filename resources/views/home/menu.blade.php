@extends('layouts.mazer')

@section('page-heading', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 style="text-align: center">بِسْــــــــــــــــــمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h2>
        <br>
        <h3 style="text-align: right">السلام عليكم ورحمة الله وبركاته</h3>
        <h5 style="text-align: right">أهلا و سهلا و مرحبا</h5>
        <div class="card">
            <div class="card-header">
                <h4>Profile Visit</h4>
            </div>
            <div class="card-body">
                <div id="chart-profile-visit"></div>
                <a href="{{ route('list') }}" class="btn btn-primary">Perpustakaan</a>
                    <br><br>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
