@extends('dashboard.layouts.main')
@section('container')
    
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Tambah Data Penelusuran Katalog</h5>
        <div class="card-body table-border-style">
            <div class="col-lg-10">
                <form method="POST" action="/dashboard/sirkulasi/penelusuran-katalog">
                    @csrf
                    <form>
                    <div class="mb-3 row">
                        <label for="title" class="col-md-2 col-form-label">Title</label>
                        <div class="col-md-10">
                          <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" required autofocus/>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="slug" class="col-md-2 col-form-label">Slug</label>
                        <div class="col-md-10">
                          <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}" disabled/>
                        @error('slug')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="category" class="col-md-2 col-form-label">Category</label>
                            <div class="col-md-10">
                            <select class="form-control" id="category" name="category_id">
                                @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="penulis" class="col-md-2 col-form-label">Penulis</label>
                        <div class="col-md-10">
                          <input class="form-control @error('penulis') is-invalid @enderror" type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" required/>
                        @error('penulis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="edisi" class="col-md-2 col-form-label">Edisi</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="edisi" id="edisi" value="{{ old('edisi') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="isbn" class="col-md-2 col-form-label">ISBN</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-md-2 col-form-label">Penerbit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_terbit" class="col-md-2 col-form-label">Tempat Terbit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="tempat_terbit" id="tempat_terbit" value="{{ old('tempat_terbit') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_terbit" class="col-md-2 col-form-label">Tahun Terbit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="year" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-md-2 col-form-label">Jumlah</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bahasa" class="col-md-2 col-form-label">Bahasa</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="bahasa" id="bahasa" value="{{ old('bahasa') }}"/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-md-2 col-form-label">Lokasi</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"/>
                        </div>
                    </div>
                      <div class="mb-3 row">
                        <label for="body" class="col-md-2 col-form-label">Sinopsis</label>
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-10">
                          @error('body')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                      </div>
                      </div>
                    <button type="submit" class="btn btn-primary" style="float:right">Tambah Data</button>
                  </form>
            </div>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>
<!-- / Content -->

{{-- <script>
    $('#title').change(function(e) {
       $.get('{{ url('dashboard.sirkulasi.penelusuran-katalog.checkSlug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script> --}}
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/sirkulasi/penelusuran-katalog/checkSlug?title=' +title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection
