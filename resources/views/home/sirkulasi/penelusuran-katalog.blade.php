@extends('layouts.main')

@section('container')
 
 
  <div class="container">
    <h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147">{{ $title }} </span></h1>
    
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="/home/sirkulasi/penelusuran-katalog">Penelusuran Katalog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Semua</li>
      </ol>
    </nav>

    <section class="pt-5">
      <form action="/home/sirkulasi/penelusuran-katalog">
      <div class="row">
        <div class="col-md-auto mt-2">
            <div class="search rounded-pill"><input type="text" class="form-control rounded-pill" placeholder="Search books, articles, keywords" name="search"> <i class="fa fa-search"></i></div>
        </div>
        @if (request('category'))
        <input type="hidden" class="form-control rounded-pill" placeholder="Search books, articles, keywords" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
        <input type="hidden" class="form-control rounded-pill" placeholder="Search books, articles, keywords" name="author" value="{{ request('author') }}">
        @endif
        <div class="col-md-auto mt-2">
          <select class="form-select rounded-pill" aria-label="Default select example" name="">
            <option selected>Jenis</option>
            <option value="booklet">Booklet</option>
            <option value="buku">Buku</option>
            <option value="laporan program">Laporan Program</option>
            <option value="laporan ta">Laporan TA</option>
            <option value="majalah">Majalah</option>
            <option value="softfile">Softfile</option>
          </select>
        </div>
        <div class="col-md-auto mt-2">
              <button class="btn btn-search " type="submit">Search</button>
        </div>
      </div>
    </form>
    </section>
   
    <!--Penelusuran Katalog-->
  @if ($katalogs->count()) 
  <section class="pt-2">
        <article>
          <div class="container">
            <div class="row">
              @foreach ($katalogs as $katalog)
              <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                  <div class="card-custom-avatar">
                      <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
                  </div>
                </div>
                  <div class="card-body">
                    <h6 class="pt-5">{{ $katalog->title }}</h6>
                    <p>by <a href="/home/sirkulasi/penelusuran-katalog/?author={{ $katalog->author->username }}" class="text-primary" style="font-size: 13px;">{{ $katalog->penulis }}</a></p>
                    <p style="font-size: 13px;">2016</p>
                    <p>{!! $katalog->excerpt !!}
                    <a href="/home/sirkulasi/penelusuran-katalog/{{ $katalog->slug }}" class="text-primary">Read More...</a></p> 
                    <a type="button" class="btn btn-outline-secondary btn-sm" style="font-weight: bold;" href="/home/sirkulasi/penelusuran-katalog?category={{ $katalog->category->slug }}">{{ $katalog->category->name }}</a>
                  </div>
              </div>
              @endforeach
            </div>
          </div>
        </article>
        @else
        <p class="text-center fs-4">No Post Found.</p>
        @endif
            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  {{ $katalogs->links() }}
                </li>
              </ul>
            </nav>
          </div>
  </section>
  </div> 
    
  
 
@endsection