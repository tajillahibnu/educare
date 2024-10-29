var kelompok_id = '';

onNewKelompokMapel = () => {
    kelompok_id = '';
    $('#formKelMapel').trigger('reset');
    $('#modal-kelompok_mapel').modal('show');
}
onEditKelompokMapel = (el) => {
    $('#formKelMapel').trigger('reset');
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    kelompok_id = data['id'];
    $.each(data, (i, v) => {
        $(`#formKelMapel [name="${i}"]`).val(v);
    })
    $('#modal-kelompok_mapel').modal('show');
}

onSaveItKelMapel = (name) => {
    var form = $(`#${name}`)[0];
    var formData = new FormData(form);
    var action = kelompok_id == '' ? 'store' : 'update/' + kelompok_id;

    formData.append('kurikulum_id', targetID);

    APP.axiosRequest({
        url: `${BASE_URL_MENU}kelompok_mapel/${action}`,
        data: formData,
    }).then(data => {
        APP.reloadTable({ el: '#tableKelompokMapel' });
        $('#modal-kelompok_mapel').modal('hide');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}

deleteKelMapel = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    APP.confirm({
        title: 'Confirmation Delete',
        text: "Do you want to proceed?",
    }).then((result) => {
        if (result.isConfirmed) {
            APP.axiosRequest({
                url: `${BASE_URL_MENU}kelompok_mapel/delete`,
                data: {
                    id: data['id']
                },
            }).then(data => {
                APP.reloadTable({ el: '#tableKelompokMapel' });
            }).catch(error => {
                console.error("Fetch error:", error);
            });
        }
    });
}

onSaveMapel = (el) => {
    var data = $(el).data('params')
    var enrol = $(el).data('enrol')
    data = JSON.parse(atob(data));
    enrol = JSON.parse(atob(enrol));

    APP.axiosRequest({
        url: `${BASE_URL_MENU}save_mapel`,
        data: {
            group_id: kelompok_id,
            mapel_id: data['id']
        },
    }).then(data => {
        console.log(data)
        // APP.reloadTable();
        // $('#modal-main').modal('hide');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}

showMapel = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    kelompok_id = data['id'];
    tableMapel();
    $('#modal-mapel').modal('show');
}

tableMapel = () => {
    APP.initTable({
        el: '#tableMapel', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}table-mapel`, // URL endpoint API untuk mengambil data
        data: {
            kelompok_id: kelompok_id
        },
        columnDefs: [
            {
                targets: 1,
                data: 'name',
                render: function (data, type, full, meta) {
                    return full['name'];
                },
            },
            {
                targets: 2,
                width: "80px",
                render: function (data, type, full, meta) {
                    return APP.decodeEntities(full['enrol_mapel'])
                },
            }
        ]
    });
}

tableKelompokMapel = () => {
    APP.initTable({
        el: '#tableKelompokMapel', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}table-kelompokmapel`, // URL endpoint API untuk mengambil data
        data: {
            kurikulum_id: targetID
        },
        columnDefs: [
            {
                targets: 1,
                data: 'name',
                render: function (data, type, full, meta) {
                    return full['name'];
                },
            },
            {
                targets: 2,
                visible: false,
                render: function (data, type, full, meta) {
                    return '-';
                },
            },
            {
                targets: 3,
                width: "30px",
                render: function (data, type, full, meta) {
                    return APP.decodeEntities(full['action']);
                },
            },
        ]
    });
}