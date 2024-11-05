$(() => {
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: BASE_URL + '/api/desk/main-table', // URL endpoint API untuk mengambil data
        pageLength: 10, // Jumlah baris per halaman
        sorting: 'asc', // Urutan sorting default
        index: 1, // Kolom yang diurutkan
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
                width: "50px", // Mengatur lebar kolom nomor urut
                // data: 'name',
                render: function (data, type, full, meta) {
                    return full['action'];
                },
            }
        ]
    });
}