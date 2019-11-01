$(function () {
    // alert('selamat belajar');
    // let tombol= document.querySelector('#tombol-tambah');
    // tombol.textContent = 'ubah data';

    // let cariSpanDariDivSatu = $(.content div').eq(0).find('span');
    // cariSpanDariDivSatu.find('span');


    //methodchaining

    let tombol = $('#tombol-tambah');

    tombol.on('click',function (e) {
        // $('.informasi').show('slow');
        //mengambil data dummy user lewat ajax menggunakan api reqres
        $.ajax({
            type: "Get",
            url: "https://reqres.in/api/users",
            data: {
                format: 'json',
            },
            dataType: "json",
            //data = data yg diambil
            success: function (data) {
                // let temp = data.data[2];
                // alert('Berhasil mengambil data');
                // $('.card-img-top').attr('src',temp.avatar);
                // $('.card-title').text(temp.first_name+' '+temp.last_name);
                // $('.card-text span').text(temp.email);
                for (let index = 0; index < (data.data).length; index++) {
                    let dataa = data.data[index];
                    let card = generateCard(dataa.avatar,dataa.first_name,dataa.email);
                    // let cardObj = $(card);

                    $('.card-area').append('<div class="col-4">'+ card +'</div>')
                }
            },

            error: function (param) {
                alert('Gagal mengambil data')
            }
        });
        e.preventDefault();
    });


    $('#tombol-sembunyi').click(function(e){
        // $('.informasi').hide('slow');

        e.preventDefault();
    });


});
function generateCard(img,name,email) {
    let card ='';

    card += '<div class="card mt-5" style="width: 18rem; height=300px">';
    card +=  '<img class="card-img-top" src="'+ img +'" alt="Card image cap">';
    card += '<div class="card-body">';
    card += '<h5 class="card-title">'+ name +'</h5>'
    card += '<p class="card-text">';
    card += 'Email : <span>'+ email+'</span>';
    card += '</p></div></div>';

    return card;
}
