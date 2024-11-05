var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/kurikulum/`;


$(() => {
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}main-table`, // URL endpoint API untuk mengambil data
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
                    return APP.decodeEntities(full['action']);
                },
            },
        ]
    });
}