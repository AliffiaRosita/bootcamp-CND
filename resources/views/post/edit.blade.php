@extends('includes.adminlte.template',['content_title'=>'Post'])
@section('title')
Halaman Post
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Ubah Postingan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
            <a href="{{url('admin/post')}}" class="btn btn-sm btn-secondary float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    <form action="{{url('admin/post/'.$posts->id.'/update')}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group mt-2">
                        <form action="">
                      <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Judul Postingan" value="{{$posts->title}}" name="title">
                    </div>
                    <div class="form-group">
                      <label for="content">Isi Postingan</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Isi Postingan..">{{$posts->content}}}</textarea>
                    </div>
                    <label for="">Status</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status_draft" value="0" name="is_draft" class="custom-control-input" {{ $posts->is_draft =='0'? 'checked':'' }}>
                            <label class="custom-control-label" for="status_draft">Draft</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="status_publish" value="1" name="is_draft" class="custom-control-input" {{ $posts->is_draft =='1'? 'checked':'' }}>
                                <label class="custom-control-label" for="status_publish">Publish</label>
                              </div>
                              <br> <br>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-send"></i> Simpan perubahan</button>
                  </form>
        </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
