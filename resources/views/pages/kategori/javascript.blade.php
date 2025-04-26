<script>
    $(document).ready(function () {
        $("#data").DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: '/api/kategori',
                method: 'GET',
                dataSrc: ''
            },
            columns: [
                {
                    data: 'kategori_nama',
                    render: function(data, type, row) {
                        return data;
                    }
                },
                {
                    data: 'kategori_id',
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-danger" onclick="onDelete('${data}');"><i class="fas fa-trash-alt"></i></i></button>
                            <button class="btn btn-warning" onClick="onEdit('${data}');"><i class="far fa-edit"></i></button>
                        `;
                    }
                }
            ]
        });

        $('#formKategori').on('submit', function (e) {
            e.preventDefault();
            let url = '/api/kategori'
            let method = "POST" 
            let data = {
                kategori_nama: $('#kategori_nama').val()
            };

            if ($('#formKategori').attr('data-id')) {
                url = '/api/kategori/' + $('#formKategori').attr('data-id')
                method = 'PATCH'
            }

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function (res) {
                    $.notify({
                        icon: 'icon-bell',
                        title: 'Success',
                        message: res.message,
                    },{
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                    $('#formKategori')[0].reset();
                    $('#data').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    $.notify({
                        icon: 'icon-bell',
                        title: 'Failed',
                        message: "Gagal Melakukan Aksi",
                    },{
                        type: 'danger',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                    console.log(xhr.responseJSON);
                }
            });
        });
    });

    function onEdit(id) { 
        $.ajax({
            url: '/api/kategori/' + id, 
            method: 'GET',
            success: function (res) {
                console.log(res.kategori_nama)
                $('#kategori_nama').val(res.kategori_nama); 
                $('#formKategori').attr('data-id', id); 
                $('#submitKategori').text('Update'); 
            },
            error: function (xhr) {
                $.notify({
                    icon: 'icon-warning',
                    title: 'Error',
                    message: 'Gagal mengambil data kategori.',
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    time: 1000,
                });
                console.log(xhr.responseJSON);
            }
        });
    }

    function onDelete(id) { 
        swal({
          title: "Yakin untuk menghapus ini?",
          text: "Data tidak dapat dikembalikan!",
          type: "warning",
          buttons: {
            confirm: {
              text: "Ya, hapus ini!",
              className: "btn btn-success",
            },
            cancel: {
              visible: true,
              className: "btn btn-danger",
            },
          },
        }).then((Delete) => {
          if (Delete) {
            $.ajax({
                url: '/api/kategori/' + id,
                method: 'DELETE',
                success: function (res) {
                    $.notify({
                        icon: 'icon-bell',
                        title: 'Success',
                        message: res.message,
                    },{
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                    $('#data').DataTable().ajax.reload(); 
                },
                error: function (xhr) {
                    $.notify({
                        icon: 'icon-bell',
                        title: 'Failed',
                        message: "Gagal Melakukan Aksi",
                    },{
                        type: 'danger',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                    console.log(xhr.responseJSON);
                }
            });
          } else {
            swal.close();
          }
        });
    }
</script>