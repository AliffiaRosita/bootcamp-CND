@extends('includes.adminlte.template',['content_title'=>'Categories'])
@section('title')
Halaman Category
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Category</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        {{-- add button --}}
    <a href="{{url('admin/categories/create')}}" class="btn btn-sm btn-success add-data" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus"></i> Tambah</a>
    <br><br>
    {{-- tabel data --}}
        <table class=" table table-striped" id="datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
        <tr data-id="{{$category->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>{{str_limit($category->description,100)}}</td>
            <td ><a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary btn-sm edit-data"><i class="fa fa-edit"></i></a>
                <a href="{{url('admin/categories/'.$category->id)}}" class="btn btn-danger btn-sm delete-data"><i class="fa fa-trash"></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>

  <form action="" id="form-delete" method="POST">
        @csrf
        @method('DELETE')
  </form>
  @include('category._modal')
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">

    @endpush
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
@include('category._script')
@endpush
