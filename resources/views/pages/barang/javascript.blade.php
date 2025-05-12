<script>
    $(document).ready(function () {
        $('#barang_kategori').select2({
            // theme: 'bootstrap',
            ajax: {
                url: '/api/kategori',
                dataType: 'json',
                processResults: function (data) {
                    
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.kategori_id,
                                text: item.kategori_nama
                            };
                        })
                    };
                }
            },
            placeholder: 'Pilih kategori',
            width: '100%',
        });

        $("#data").DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: '/api/barang',
                method: 'GET',
                dataSrc: ''
            },
            columns: [
                {
                    data: 'barang_nama',
                    render: function(data, type, row) {
                        return data;
                    }
                },
                {
                    data: 'barang_harga',
                    render: function(data, type, row) {
                        return data;
                    }
                },
                {
                    data: 'kategori',
                    render: function(data, type, row) {
                        return data.kategori_nama;
                    }
                },
                {
                    data: 'barang_id',
                    orderable: false, 
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-danger" onclick="onDelete('${data}');"><i class="fas fa-trash-alt"></i></i></button>
                                <button class="btn btn-warning" onClick="onEdit('${data}');"><i class="far fa-edit"></i></button>
                            </div>
                        `;
                    }
                }
            ]
        });

        $('#formBarang').on('submit', function (e) {
            e.preventDefault();
            let url = '/api/barang'
            let method = "POST" 
            let data = {
                barang_nama: $('#barang_nama').val(),
                barang_harga: $('#barang_harga').val(),
                barang_kategori: $('#barang_kategori').val()
            };

            if ($('#formBarang').attr('data-id')) {
                url = '/api/barang/' + $('#formBarang').attr('data-id')
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
                    $('#data').DataTable().ajax.reload();
                    onCancel()
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
        openForm()
        $.ajax({
            url: '/api/barang/' + id, 
            method: 'GET',
            success: function (res) {
                $('#barang_nama').val(res.barang_nama); 
                $('#barang_harga').val(res.barang_harga); 
                $('#barang_kategori').val(res.barang_kategori).trigger('change');
                $('#formBarang').attr('data-id', id); 
                $('#submitBarang').text('Update'); 
            },
            error: function (xhr) {
                $.notify({
                    icon: 'icon-warning',
                    title: 'Error',
                    message: 'Gagal mengambil data.',
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
                url: '/api/barang/' + id,
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
                    onCancel()
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

    function onCancel() {
        $('#formBarang')[0].reset();
        $('#formBarang').attr('data-id', ""); 
        $('#submitBarang').text('Submit'); 
        $("#form").hide()
        $("#dataView").show()
    }

    function openForm() {
        $("#form").show()
        $("#dataView").hide()
    }
</script>