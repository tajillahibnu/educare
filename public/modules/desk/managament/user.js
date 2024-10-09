$(() => {
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL}/api/desk/management/user/main-table`, // URL endpoint API untuk mengambil data
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
                data: 'role_name',
                render: function (data, type, full, meta) {
                    return full['role_name'];
                },
            },
        ]
    });
}