<script>
$(function () {

    $('#datatable').DataTable();

    const targetUrl = '{{url("admin/categories")}}';
    //saat form disubmit
    $('form').on('submit',function (e) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url : url,
            data : form.serialize(),
            success : function (res) {
                swal("Sukses",res.message,"success");
                $('#modal-form').modal('hide');
                if(res.type == 'add'){

                const $lastRow = $('table tbody tr:last');
                const $cloneRow = $lastRow.clone();
                const lastNo = $cloneRow.find('td').eq(0).text();

                //ubah data kolom baris yang di clone
                $cloneRow.find('td').eq(0).text(
                    parseInt(lastNo)+1
                );
                $cloneRow.find('td').eq(1).text($('#name').val());
                $cloneRow.find('td').eq(2).text($('#description').val());

                $lastRow.after($cloneRow);

                }else if(res.type =='update'){
                    const $findRow =  $('table tbody tr[data-id="'+res.id+'"]');
                    $findRow.find('td').eq(1).text($('#name').val());
                    $findRow.find('td').eq(2).text($('#description').val());

                }else{
                    const $findRow =  $('table tbody tr[data-id="'+res.id+'"]');
                    $findRow.remove();

                }
            },
            error: function (xhr) {
              let errorText= '';
              $.each(xhr.responseJSON.errors, function (key,value) {
                  errorText +=value +'/'
              })
              swal('Gagal !',errorText,"warning");
             }
        });
    });

        $('.add-data').on('click', function (e) {

            //tampilkan modal
            $('#modal-form').modal('show');
            $('.modal-title').text('Tambah Data');

            //ambil parent dari button
            var $parent = $(this).closest('tr');
            $('#name').val('');
            $('#description').val('');

            $('#form-add').attr('action',targetUrl);
            $('input[name="_method"]').prop('disabled',true);

            e.preventDefault();
        });
    //aksi saat button edit di klik
    $('.edit-data').on('click', function (e) {

        //tampilkan modal
        $('#modal-form').modal('show');
        $('.modal-title').text('Ubah Data');

        //ambil parent dari button
         var $parent = $(this).closest('tr');
        $('#name').val(
            $parent.find('td').eq(1).text()
        );
        $('#description').val(
            $parent.find('td').eq(2).text()
        );

        $('#form-add').attr('action',
        targetUrl+'/'+$parent.attr('data-id')
        );
        $('input[name="_method"]').prop('disabled',false);

        e.preventDefault();
    });

    $('.delete-data').on('click', function (e) {
        $('#form-delete').attr('action',
            $(this).attr('href')
        );
        swal({
            title: "Peringatan !",
            text: "Data yang sudah terhapus tidak bisa dikembalikan",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
        if (willDelete) {
           $('#form-delete').submit();
            } else {
                swal("Your imaginary file is safe!");
            }
});
        e.preventDefault();
    });




});

</script>

