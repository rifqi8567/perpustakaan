@extends('layouts.mazer')

@section('page-heading', 'Shop')
@section('content')

    <div class="row d-flex flex-row flex-nowrap gap-5">

  
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/image.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Rp.113.000.00</a>
                  <br>
                  <i class="bi bi-geo-alt" style="text-align: left">Jakarta Barat</i>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="{{asset('img/buku (1).jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Rp.112.000.00</a>
                  <br>
                  <i class="bi bi-geo-alt" style="text-align: left">Jakarta Selatan</i>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img src="{{asset('img/buku2 (1).jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Rp.110.000.00</a>
                  <br>
                  <i class="bi bi-geo-alt" style="text-align: left">Jakarta Timur</i>
                </div>
              </div>
            </div>
          </div>
          </div>             
@endsection