var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/management/user/`;

$(() => {
    mainTable()
    APP.combov1({
        el: ['#main_role', '#sub_role'],
        url: `${BASE_URL_MENU}combo/role`,
        fild_id: 'id',
        fild_name: 'name',
        dropdownParent: '#modal-main'
    })
})

mainTable = () => {
    APP.initTable({
        el: '#maintable', // ID atau kelas elemen tabel HTML
        url: `${BASE_URL_MENU}table`, // URL endpoint API untuk mengambil data
        order: [
            [2, 'asc']
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
                // data: 'role_name',
                render: function (data, type, full, meta) {
                    return full['role_name'];
                },
            },
            {
                targets: 3,
                data: 'is_active',
                render: function (data, type, full, meta) {
                    // return full['is_active'];
                    return full['is_active'] ? '<span class="badge bg-label-success">Aktive</span>' : '<span class="badge bg-label-danger">Non-Aktive</span>';
                },
            },
            {
                targets: 4,
                render: function (data, type, full, meta) {
                    return full['action'];
                },
            },
        ]
    });
}

onEditUser = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    targetID = data['id'];
    $(`[name="main_role"]`).val('0').trigger('change');
    APP.axiosRequest({
        url: `${BASE_URL_MENU}show`,
        data: {
            'id': data['id']
        },
    }).then(data => {
        $.each(data['data'], (i, v) => {
            $(`[name="${i}"]`).val(v).trigger('change');
        })
        $(`#sub_role`).val(data['data']['subRole']).trigger('change');
        $(`[name="main_role"]`).val(data['data']['primary_role_id']).trigger('change');
        $('#modal-main').modal('show');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
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
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}