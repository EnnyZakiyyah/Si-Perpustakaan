@extends('dashboard.layouts.main')
@section('container')
<!-- Content -->

@foreach ($katalogs as $katalog)
    
@endforeach

<!-- [ Hover-table ] start -->
<div class="card">
    <div class="row g-0">
        <div class="col-md-4">
            <img class="card-img card-img-left" src="{{ asset('assets/img/design.png') }}" alt="Card image" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
              <div class="card-body table-border-style">
                <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row" style="text-align: left;">Kategori</th>
                            <td>:</td>
                            <td style="text-align: justify !important"><a
                                    href="/home/sirkulasi/penelusuran-katalog?category={{ $katalog->category->slug }}"
                                    class="badge bg-dark text-white">{{ $katalog->category->name }}</a></td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left;">Judul</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->title }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Penulis</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->author->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Edisi</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->edisi }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">ISBN</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->isbn }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Penerbit</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->penerbit }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Tahun Terbit</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Tempat Terbit</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->tempat_terbit }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Jumlah</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->jumlah }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Bahasa</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->bahasa }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Lokasi Buku</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{{ $katalog->lokasi }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="text-align: left">Sinopsis</th>
                            <td>:</td>
                            <td style="text-align: justify !important">{!! $katalog->body !!}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="py-3">
                    <a href="/dashboard/sirkulasi/penelusuran-katalog" class="btn btn-info"><i class="feather icon-arrow-left" style="color: white"></i>Back</a>
                    <a href="" class="btn btn-warning"><i class="feather icon-edit" style="color: white"></i></i>Edit</a>
                    <form action="/dashboard/sirkulasi/penelusuran-katalog/{{ $katalog->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="feather icon-x-circle" style="color: white"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    <!-- [ Hover-table ] end -->
    </div>
</div>


    @endsection
