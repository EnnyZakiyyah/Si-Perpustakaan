@extends('dashboard.layouts.main')
@section('container')
 <!-- [ Hover-table ] start -->
    <div class="card">
        <div class="card-header">
            <h5>Penelusuran Katalog</h5>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="col-md-4 px-3 py-3">
            <a href="/dashboard/sirkulasi/penelusuran-katalog/create" class="btn btn-primary me-2 px-3">Tambah Data</a>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>ISBN</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katalogs as $katalog)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $katalog->title }}</td>
                            <td>{{ $katalog->penulis }}</td>
                            <td>{{ $katalog->isbn }}</td>
                            <td>{{ $katalog->tahun_terbit }}</td>
                            <td>
                                <a href="/dashboard/sirkulasi/penelusuran-katalog/{{ $katalog->slug }}"
                                    class="badge bg-info"><i class="feather icon-eye" style="color: white"></i></a>
                                <a href="" class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a>
                                <a href="" class="badge bg-danger"><i class="feather icon-x-circle" style="color: white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
<!-- [ Hover-table ] end -->


@endsection
