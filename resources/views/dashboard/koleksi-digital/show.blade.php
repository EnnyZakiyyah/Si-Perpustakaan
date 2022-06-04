@extends('dashboard.layouts.main')
@section('container')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Responsive Table --> 
    <div class="row">
        <div class="col-md">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img card-img-left" src="{{ asset('assets/img/design.png') }}" alt="Card image" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Judul</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content
                    is a
                    little bit longer.
                  </p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    <!--/ Responsive Table -->
</div>
<!-- / Content -->

@endsection
