@extends('includes.adminlte.template',['content_title'=>'Post'])
@section('title')
Halaman Post
@endsection
@section('content')
{{-- cek validasi --}}
@if ($errors->any())
    <div class="alert alert-danger">
            <h3>Terjadi Kesalahan</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Postingan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <a href="{{url('admin/post')}}" class="btn btn-sm btn-secondary float-right"><i class="fa fa-arrow-left"></i>
            Kembali</a>
        <form action="{{url('admin/post')}}" method="POST" id="form-add" enctype="multipart/form-data">
            @csrf
            {{-- image upload --}}
            <div class="form-group mt-2">
                    <label for="content">Foto Sampul</label>
                    <div >
                            <img src="https://via.placeholder.com/200x200" width="200px" height="200px" alt="" id="preview-img" class="img-thumbnail">
                    </div>
                    <input class="form-control" type="file" name="cover" id="cover">
                </div>
                {{-- end image area --}}
            <div class="form-group ">
                    <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" value="{{old('title')}}" aria-describedby="emailHelp"
                        placeholder="Judul Postingan" name="title">
            </div>
            <div class="form-group">
                <label for="content">Isi Postingan</label>
            <textarea class="summernote" id="content"  name="content" >{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="categories[]" id="kategori" multiple class="form-control">
                    <option value="" >Pilih</option>
                    @foreach ($categories as $category)
                    @if (old("categories"))
                         @if (in_array($category->id, old("categories")))
                            @php $selected = 'selected' @endphp
                        @else
                            @php $selected ='' @endphp
                        @endif
                    @endif

                    <option value="{{$category->id}}" {{$selected ?? ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author">Penulis</label>
                <select name="author_id" id="author" class="form-control">
                    <option value="">Pilih</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}" {{old('author_id')== $user->id ? 'selected':''}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <label for="">Status</label>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="status_draft" value="0" name="is_draft" class="custom-control-input">
                <label class="custom-control-label" {{old('is_draft')=='0' ? 'checked':''}} for="status_draft">Draft</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="status_publish" value="1" name="is_draft" class="custom-control-input">
                <label class="custom-control-label" for="status_publish" {{old('is_draft')== '1' ? 'selected':''}}>Publish</label>
            </div>
            <br> <br>
            <button type="reset" class="btn btn-danger"> <i class="fa fa-times"></i> Reset</button>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-send"></i> Submit</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<style>
.select2-container .select2-container--default .select2-selection--multiple .select-2-selection__choice{
        background-color: #0062cc;
        border-color: white;

    }
    .select-2-container .select-2-selection--single{
        height: 34px;
    }

</style>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush
@push('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script>
        $(function(){
            $('#kategori, #author').select2({
                placeholder: 'pilih:'
            });
            $('#cover').on('change',function () {
                readURL(this);
            });
        });
    </script>
    <script>

         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-img')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
    $(document).ready(function() {
    $('.summernote').summernote({
        placeholder: 'Tuliskan isi konten disini',
        height: 200
    });
    });
    </script>
@endpush

