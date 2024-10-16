var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/master/tahun_akademik/`;
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
                data: 'year',
                render: function (data, type, full, meta) {
                    return full['year'];
                },
            },
            {
                targets: 2,
                width: "80px",
                render: function (data, type, full, meta) {
                    return full['action'];
                },
            },
        ]
    });
}

newData = () => {
    targetID = '';
    $('#modal-main').modal('show');
}

editData = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    targetID = data['id'];
    
    $.each(data, (i, v) => {
        $(`[name="${i}"]`).val(v);
    })
    $('#modal-main').modal('show');
}

onSaveIt = (name) => {
    var form = $(`#${name}`)[0];
    var formData = new FormData(form);
    var action = targetID == '' ? 'store' : 'update/' + targetID;

    APP.axiosRequest({
        url: `${BASE_URL_MENU}${action}`,
        data: formData,
    }).then(data => {
        APP.reloadTable();
        $('#modal-main').modal('hide');
    });
}

deleteData = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    targetID = data['id'];
    APP.confirm({
        title: 'Confirmation Delete',
        text: "Do you want to proceed?",
    }).then((result) => {
        if (result.isConfirmed) {
            APP.axiosRequest({
                url: `${BASE_URL_MENU}delete`,
                data: {
                    id: targetID
                },
            }).then(data => {
                APP.reloadTable();
            });
        }
    });

}