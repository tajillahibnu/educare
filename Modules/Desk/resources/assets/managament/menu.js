// var tableConfig = {
//     el: '#maintable', // ID atau kelas elemen tabel HTML
//     url: BASE_URL+'main-table', // URL endpoint API untuk mengambil data
//     pageLength: 10, // Jumlah baris per halaman
//     sorting: 'asc', // Urutan sorting default
//     index: 1, // Kolom yang diurutkan
//     // columns: [
//     //     { title: "No", data: "no" },
//     //     { title: "Nama", data: "name" },
//     //     { title: "Email", data: "email" },
//     //     { title: "Alamat", data: "address" }
//     // ], // Kolom-kolom yang sesuai dengan respon dari server
//     data: { filter: 'active' }, // Data tambahan yang akan dikirimkan bersama permintaan
// };


$(() => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: BASE_URL + '/api/desk/main-table', // URL endpoint API untuk mengambil data
        pageLength: 10, // Jumlah baris per halaman
        sorting: 'asc', // Urutan sorting default
        index: 1, // Kolom yang diurutkan
        // columns: [
        //     { title: "No", data: "id" },
        //     { title: "name", data: "name" },
        //     { title: "action", data: "action" },
        // ], // Kolom-kolom yang sesuai dengan respon dari server
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
    // $('#main-table').DataTable();
    // mainTable();
})

mainTable = () => {
    APP.axiosRequest({
        url: `${BASE_URL}/api/desk/main-table`,
        data: {
            lol: 'zzzz',
            zoom: 'pppppp',
        },
    }).then(data => {
        console.log("Data fetched:", data);
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}