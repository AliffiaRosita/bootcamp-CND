@extends('includes.adminlte.template',['content_title'=>'Belajar javascript dan jquery'])

@section('title') Halaman js @endsection


@section('content')
<p class="informasi">View nyabelum kepake dulu!.</p>
<a href="#" class="btn btn-success" id="tombol-tambah">Tampilkan informasi</a>
<a href="#" class="btn btn-info" id="tombol-sembunyi">Sembunyikan informasi</a>

{{-- <div>
    <span>Coba target saya</span>
</div> --}}

{{-- <div class="card mt-5" style="width: 18rem; height=300px">
    <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Nama Pengguna</h5>
      <p class="card-text">
          Email : <span>x</span>
      </p>
    </div>
  </div> --}}

  <div class="card-area row">

  </div>

@endsection
@push('css')
<style>
    .informasi {
        display: none;
    }

    .red {
        color: red;
        font-size: 20px;
    }

    .blue {
        color: blue;
        font-size: 40px;
    }

</style>
@endpush
@push('js')
<script src="{{asset('js/belajar.js')}}"></script>
@endpush
