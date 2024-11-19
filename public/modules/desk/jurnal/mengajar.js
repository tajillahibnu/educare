var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/jurnal/kbm/`;

$(() => {
    $('#page-form').hide();
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}main-table`, // URL endpoint API untuk mengambil data
        columnDefs: [
            {
                targets: 1,
                data: 'materi',
                render: function (data, type, full, meta) {
                    return full['materi'];
                },
            },
            {
                targets: 2,
                render: function (data, type, full, meta) {
                    return full['created_at'];
                },
            },
            {
                targets: 3,
                width: "80px",
                render: function (data, type, full, meta) {
                    return full['status_approval_waka'] == 'approved' ? '<span class="badge bg-label-success">Approved</span>' : '<span class="badge bg-label-danger">Pending</span>';
                },
            },
            {
                targets: 4,
                width: "80px",
                render: function (data, type, full, meta) {
                    return APP.decodeEntities(full['action']);
                },
            },
        ]
    });
}

jurnalMengajar = (action,el)=>{
    if(action == 'store'){
        $('#page-main').fadeOut(500, function() {
            // Setelah fadeOut selesai, kita bisa memanggil fadeIn
            $('#page-form').fadeIn(500);
        });
    }
    if(action == 'store'){

    }

    $('.back-main').click(function() {
        $('#page-form').fadeOut(500, function() {
            APP.reloadTable()
            $('#page-main').fadeIn(500);
        });
    });
}