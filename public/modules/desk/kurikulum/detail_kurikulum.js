onDetailPage = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    console.log(data)
    targetID = data['id'];
    updateCheckbox(data['is_active'])
    $.each(data, (ii, vv) => {
        $(`.detail-${ii}`).html(vv);
    })

    var myQueue = new Queue();
    myQueue.enqueue(function (next) {
        tableKelompokMapel();
        tableKelas();
        // showTab(`<a class="nav-link active" data-tabName="ktgMapel"><i class="ti ti-map-pin ti-sm me-1_5"></i></a>`);
        next();
    }, '1m').enqueue(function (next) {
        $('#page-main').fadeOut(500, function () {
            $('#page-detail').fadeIn(500);
            $('#cancelButton').click(function () {
                $('#page-detail').fadeOut(500, function () {
                    $('#page-main').fadeIn(500);
                });
            });
        });
    }, 'end').dequeueAll();
}

// Fungsi untuk memperbarui status tanpa memicu event change
function updateCheckbox(status) {
    var nameSwitch = $('[name="status_kurikulum"]');
    nameSwitch.off('change'); // Matikan event handler sementara
    nameSwitch.prop('checked', status);
    nameSwitch.on('change', function () { // Hidupkan kembali setelah update
        var isChecked = $(this).prop('checked');
        if (isChecked) {
            status = 1;
        } else {
            status = 0;
        }

        updateStatus(status);
    });
}

updateStatus = (status) => {
    APP.axiosRequest({
        url: `${BASE_URL_MENU}update_status`,
        data: {
            kurikulum_id: targetID,
            status: status
        },
    }).then(data => {
        APP.reloadTable();
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}

// Fungsi untuk mengaktifkan tab yang diklik berdasarkan id
showTab = (clickedTab, tabGroupId = 'tabMainData') => {
    var data = $(clickedTab).data();
    // Ambil semua tab di dalam grup tertentu berdasarkan id
    const tabGroup = document.querySelectorAll(`#${tabGroupId} .nav-link`);
    tabGroup.forEach(tab => tab.classList.remove('active'));

    // Tambahkan kelas 'active' pada tab yang diklik
    clickedTab.classList.add('active');
    $(`.tabKurikulum`).hide()
    $(`#panel-${data['tabname']}`).show()
}

showEditKurikulum = () => {
    APP.axiosRequest({
        url: `${BASE_URL_MENU}read`,
        data: {
            kurikulum_id: targetID,
        },
    }).then(data => {
        $('#modal-edit').modal('show');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}

tableKelas = () => {
    APP.initTable({
        el: '#tableKelas', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}kelas/table`, // URL endpoint API untuk mengambil data
        data: { kurikulum_id: targetID },
        order:[
            [2,'desc']
        ],
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
                data: 'tingkat',
                render: function (data, type, full, meta) {
                    return full['tingkat'];
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