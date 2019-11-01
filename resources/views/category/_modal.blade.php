<div class="modal fade" tabindex="-1" role="dialog" id="modal-form">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('admin/categories')}}" id="form-add" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mt-2">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="Nama Kategori ..." name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            placeholder="*opsional"></textarea>
                    </div>
                    <br> <br>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"> <i class="fa fa-times"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
