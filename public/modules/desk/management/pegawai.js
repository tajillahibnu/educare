$(() => {
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL}/api/desk/management/pegawai/main-table`, // URL endpoint API untuk mengambil data
        columnDefs: [
            {
                targets: 1,
                data: 'nik',
                render: function (data, type, full, meta) {
                    return full['nik'];
                },
            },
            {
                targets: 2,
                data: 'name',
                render: function (data, type, full, meta) {
                    return full['name'];
                },
            },
            {
                targets: 3,
                data: 'gender',
                render: function (data, type, full, meta) {
                    return full['gender'];
                },
            },
            {
                targets: 4,
                data: 'action',
                width: "80px", 
                render: function (data, type, full, meta) {
                    return full['action'];
                },
            },
        ]
    });
}

