@extends('includes.adminlte.template',['content_title'=>'Post'])
@section('title')
Halaman Post
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Postingan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        {{-- add button --}}
    <a href="{{url('admin/post/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
    <br><br>
    {{-- tabel data --}}
        <table class=" table table-striped">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Konten</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach ($posts as $key=>$post)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author->name}}</td>
                <td>{{strip_tags(str_limit($post->content,100))}}</td>
                <td>{!!$post->is_draft == '0'? '<span class="badge badge-warning">Draft</span>':'<span class="badge badge-success">Publish</span>'!!}</td>
            <td><a href="{{url('admin/post/'.$post->id.'/edit')}}" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></a>
                <form action="{{url('admin/post/'.$post->id.'/delete')}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                </form>

            </td>
            </tr>
            @endforeach
        </table>

        {{-- paginasi halaman --}}
       <div class="float-right mt-3 mb-2">
           {{$posts->links()}}</div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
