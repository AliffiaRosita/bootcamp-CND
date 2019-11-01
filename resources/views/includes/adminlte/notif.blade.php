@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mr-2 ml-2" role="alert">
                    <strong>Sukses!</strong> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show mr-2 ml-2" role="alert">
                    <strong>Gagal!</strong> {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
