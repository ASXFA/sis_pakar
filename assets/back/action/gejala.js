$(function(){
    $('#d-down-gejala').attr('class','sidebar-item selected');
    $('#a-d-down-gejala').attr('class','sidebar-link has-arrow waves-effect waves-dark active');
    $('#ul-d-down-gejala').attr('class','collapse first-level in');
    $('#gejala-page').attr('class','sidebar-link active');

    $('#btnTambahGejala').click(function(){
        $('#modalGejala').modal({backdrop:'static',show:true});
        $('#exampleModalLabel').html('Tambah Gejala');
        $('#btnTambah').val('Tambah');
        $('#operation').val('Tambah');
        $('#kode_gejala').val('');
        $('#nama_gejala').val('');
    })

    // $('#coba').click(function(){
    //     toastr["success"]("Are you the six fingered man?");
    //     toastr.options = {
    //         "closeButton": false,
    //         "debug": false,
    //         "newestOnTop": false,
    //         "progressBar": false,
    //         "positionClass": "toast-top-center",
    //         "preventDuplicates": false,
    //         "onclick": null,
    //         "showDuration": "300",
    //         "hideDuration": "1000",
    //         "timeOut": "5000",
    //         "extendedTimeOut": "1000",
    //         "showEasing": "swing",
    //         "hideEasing": "linear",
    //         "showMethod": "fadeIn",
    //         "hideMethod": "fadeOut"
    //       }
    // })

    $('#formGejala').submit(function(e){
        e.preventDefault();
        var id_gejala = $('#id_gejala').val();
        var kode_gejala = $('#kode_gejala').val();
        var nama_gejala = $('#nama_gejala').val();
        var operation = $('#operation').val();
        if (kode_gejala != '' && nama_gejala != '') {
            $.ajax({
                method:'POST',
                dataType:'JSON',
                data:{id_gejala:id_gejala,kode_gejala:kode_gejala,nama_gejala:nama_gejala,operation:operation},
                url:'doGejala',
                success:function(result){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil '+operation+' !',
                        timer:3000,
                    }).then((results) => {
                        /* Read more about handling dismissals below */
                        if (results.dismiss === Swal.DismissReason.timer) {
                            $('#table-gejala').DataTable().ajax.reload();
                            $('#modalGejala').modal('hide');
                        }else if(results.isConfirmed){
                            $('#table-gejala').DataTable().ajax.reload();
                            $('#modalGejala').modal('hide');
                        }
                    })
                }
            })
        }else{
            Swal.fire({
                icon: 'Warning',
                title: 'Peringatan !',
                text: 'Field Tidak boleh kosong !'
            })
        }
    })

    $(document).on('click','.editGejala',function(){
        var id = $(this).attr('id');
        $('#modalGejala').modal('show');
        $('#id_gejala').val(id);
        $('#btnTambah').val('Edit');
        $('#operation').val('Edit');
        $.ajax({
            method:'POST',
            dataType:'JSON',
            data:{id:id},
            url:'gejalaById',
            success:function(result){
                $('#kode_gejala').val(result.kode_gejala);
                $('#nama_gejala').val(result.nama_gejala);
            }
        })
    })

    $(document).on('click','.deleteGejala',function(){
        Swal.fire({
            title: 'Yakin Di Hapus ?',
            text: 'Data akan terhapus permanen !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus !'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('id');
                $.ajax({
                    method:'POST',
                    dataType:'JSON',
                    data:{id:id},
                    url:'deleteGejala',
                    success:function(result){
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil dihapus !',
                            timer:3000,
                        }).then((results) => {
                            /* Read more about handling dismissals below */
                            if (results.dismiss === Swal.DismissReason.timer) {
                                $('#table-gejala').DataTable().ajax.reload();
                            }else if(results.isConfirmed){
                                $('#table-gejala').DataTable().ajax.reload();
                            }
                        })
                    }
                })
            }
        })
    })
})