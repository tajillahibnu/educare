var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/kurikulum/`;

$(() => {
    comboAll();
    mainTable();
})

comboAll = () => {
    APP.combov1({
        el: ['#filter_tahun_pelajaran'],
        url: `${BASE_URL_MENU}combo/tahun`,
        fild_id: 'name',
        fild_name: 'name',
    })

    APP.combov1({
        el: ['#tahun_pelajaran'],
        url: `${BASE_URL_MENU}combo/tahun`,
        fild_id: 'name',
        fild_name: 'name',
        dropdownParent: '#modal-main'
    })
    APP.combov1({
        el: ['#kurikulum_id'],
        url: `${BASE_URL_MENU}combo/all`,
        fild_id: 'id',
        fild_name: 'name',
        dropdownParent: '#modal-main'
    })
    APP.combov1({
        el: ['#tingkat_id'],
        url: `${BASE_URL_MENU}combo/tingkat`,
        fild_id: 'id',
        fild_name: 'name',
        dropdownParent: '#modal-main'
    })
}

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}table`, // URL endpoint API untuk mengambil data
        data: {
            tahun: $('#filter_tahun_pelajaran').val()
        },
        columnDefs: [
            {
                targets: 1,
                data: 'tingkat_name',
                render: function (data, type, full, meta) {
                    return full['tingkat_name'];
                },
            },
            {
                targets: 2,
                data: 'kurikulum_name',
                render: function (data, type, full, meta) {
                    return full['kurikulum_name'];
                },
            },
            {
                targets: 3,
                width: "80px",
                render: function (data, type, full, meta) {
                    return APP.decodeEntities(full['action']);
                },
            },
        ]
    });
}

enrolKurikulum = () => {
    $('#modal-main').modal('show');
}

onSaveIt = (name) => {
    var form = $(`#${name}`)[0];
    var formData = new FormData(form);

    APP.axiosRequest({
        url: `${BASE_URL_MENU}enrol/tahun`,
        data: formData,
    }).then(data => {
        // APP.reloadTable();
        $('#modal-main').modal('hide');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}