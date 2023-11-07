$(function () {
    $('.tampilModalUbah').on('click', function () {
        const id = $(this).data('id'); // Deklarasikan variabel id di sini
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah/' + id);

        console.log(id);

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#namaMahasiswa').val(data.nama);
                $('#nim').val(data.nim);
                $('#emailMahasiswa').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });
});
