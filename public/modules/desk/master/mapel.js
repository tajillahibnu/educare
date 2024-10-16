var targetID = '';

$(() => {
    mainTable()
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL}/api/desk/master/mapel/main-table`, // URL endpoint API untuk mengambil data
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
    console.log(data)
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
        url: `${BASE_URL}/api/desk/master/mapel/${action}`,
        data: formData,
    }).then(data => {
        APP.reloadTable();
        $('#modal-main').modal('hide');
    }).catch(error => {
        console.error("Fetch error:", error);
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
                url: `${BASE_URL}/api/desk/master/mapel/delete`,
                data: {
                    id : targetID
                },
            }).then(data => {
                console.log(data)
                APP.reloadTable();
            }).catch(error => {
                console.error("Fetch error:", error);
            });
        }
    });

}