var kelas_id = '';
onNewKelas = () => {
    // loadComboOptions();
    APP.combov1({
        el: ['#tingkat_id'],
        url: `${BASE_URL_MENU}kelas/getTingkat`,
        fild_id: 'id',
        fild_name: 'name',
        dropdownParent: '#modal-kelas'
    })
    $('#formKelas').trigger('reset');
    $('#modal-kelas').modal('show');
}

onEditKelas = (el) => {
    $('#formKelas').trigger('reset');
    APP.combov1({
        el: ['#tingkat_id'],
        url: `${BASE_URL_MENU}kelas/getTingkat`,
        fild_id: 'id',
        fild_name: 'name',
        dropdownParent: '#modal-kelas'
    })
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    kelas_id = data['id'];
    $.each(data, (i, v) => {
        $(`#formKelas [name="${i}"]`).val(v).trigger('change');
    })
    setTimeout(() => {
        $(`#tingkat_id`).val(data['tingkat_id']).trigger('change');
        $('#modal-kelas').modal('show');
    }, 800);
}

onSaveItKelas = (name) => {
    var form = $(`#${name}`)[0];
    var formData = new FormData(form);
    var action = kelas_id == '' ? 'store' : 'update/' + kelas_id;

    formData.append('kurikulum_id', targetID);

    APP.axiosRequest({
        url: `${BASE_URL_MENU}kelas/${action}`,
        data: formData,
    }).then(data => {
        APP.reloadTable({ el: '#tableKelas' });
        $('#modal-kelas').modal('hide');
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}

deleteKelas = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    APP.confirm({
        title: 'Confirmation Delete',
        text: "Do you want to proceed?",
    }).then((result) => {
        if (result.isConfirmed) {
            APP.axiosRequest({
                url: `${BASE_URL_MENU}kelas/delete`,
                data: {
                    id: data['id']
                },
            }).then(data => {
                APP.reloadTable({ el: '#tableKelas' });
            }).catch(error => {
                console.error("Fetch error:", error);
            });
        }
    });
}

function loadComboOptions() {
    APP.axiosRequest({
        url: `${BASE_URL_MENU}kelas/getTingkat`,
        // data: {
        //     id: data['id']
        // },
    }).then(response => {
        const comboData = response.data;
        const $combo = $('#tingkat_id'); // Selector untuk elemen select

        // Kosongkan data combo terlebih dahulu
        $combo.empty().append('<option value="">Select an option</option>');

        // Tambahkan setiap data ke dalam select
        comboData.forEach(item => {
            $combo.append(`<option value="${item.id}">${item.name}</option>`);
        });

        // Inisialisasi select2 jika diperlukan
        $combo.select2({
            placeholder: 'Select an option',
            allowClear: true
        });
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}
