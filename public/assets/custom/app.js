var acces_role = 'admin';
var access_token = 'admin';
/**
 * Penulisan var APP = ((config) => { ... })(); 
 * adalah contoh dari Immediately Invoked Function Expression (IIFE) dalam JavaScript, 
 * yang sering digunakan untuk membuat modul atau ruang lingkup lokal untuk variabel dan fungsi
 */
var APP = ((config) => {
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.baseURL = '/api'; // Set base URL untuk semua permintaan
    // Pemetaan error kode ke tindakan yang sesuai
    const errorHandlers = {
        401: () => {
            alert("Sesi Anda telah berakhir. Anda akan diarahkan ke halaman login.");
            window.location.reload();
        },
        403: () => alert("Anda tidak memiliki izin untuk mengakses sumber daya ini."),
        419: () => {
            alert("Sesi Anda telah kedaluwarsa. Halaman akan dimuat ulang.");
            window.location.reload();
        },
    };
    // Tambahkan interceptor respons Axios untuk menangani status kode otentikasi
    axios.interceptors.response.use(
        function (response) {
            // Jika respons berhasil, langsung kembalikan respons
            return response;
        },
        function (error) {
            if (error.response && errorHandlers[error.response.status]) {
                // Panggil handler untuk status kode yang sesuai
                errorHandlers[error.response.status]();
            } else {
                // Tampilkan error yang tidak terdaftar
                console.error("Unhandled Error:", error.response ? error.response.status : error);
            }
            return Promise.reject(error);
        }
    );

    return {
        // Fungsi umum untuk permintaan data menggunakan Axios
        axiosRequest: (config) => {
            config = $.extend(true, {
                method: 'post', // Metode default untuk penyimpanan adalah POST
            }, config);
            return axios(config)
                .then(response => {
                    console.log("Response data:", response.data);
                    return response.data;
                })
                .catch(error => {
                    console.error("Axios Error:", error);
                    throw error;
                });
        },

        // Fungsi untuk menyimpan data, bisa menggunakan method POST
        save: (config) => {
            config = $.extend(true, {
                method: 'post', // Metode default untuk penyimpanan adalah POST
            }, config);

            console.log("Saving with config:", config);
            return axios.post(config.url, config.data)
                .then(response => {
                    console.log("Data saved successfully:", response.data);
                    return response.data;
                })
                .catch(error => {
                    console.error("Error while saving data:", error);
                    throw error;
                });
        },
        initTable: (config) => {
            // Pastikan columnDefs terdefinisi
            if (!config.columnDefs) {
                config.columnDefs = [];
            }

            // Menggabungkan pengaturan default dan pengaturan pengguna
            config = $.extend(true, {
                el: '#maintable',
                el_search: 'search',
                // url: BASE_API_URL,
                multiple: false,
                sorting: 'asc',
                // kode: 'bypass',
                index: 1,
                searching: true,
                tabDetails: false,
                responsive: false,
                pageLength: 10,
                mouseover: true,
                stateSave: false,
                fixedHeader: {
                    header: false,
                    footer: false
                },
                destroyAble: true,
                data: {},
                filterColumn: {
                    state: true,
                    exceptionIndex: []
                },
                callbackClick: function () { },
                rawClick: function () { },
                tokenType: 'csrf' // Tambahkan pengaturan untuk menentukan jenis token
            }, config);

            // Pengaturan DataTable
            var xdefault = {
                destroy: config.destroyAble,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: config.pageLength,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [
                    [config.index, config.sorting]
                ],
                fnDrawCallback: function (oSettings) {
                    // Inisialisasi komponen setelah menggambar
                    // KTComponents.init();
                },
                ajax: {
                    url: config.url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Tipe': 'web',
                    },
                    data: function (d) {
                        $.extend(d, config.data);
                    },
                    error: function (error) {
                        if (error.status === 401) {
                            location.reload(); // Reload jika tidak terautentikasi
                        }
                        console.error('Error fetching data:', error);
                    },
                },
                // Callback untuk menambahkan kolom dengan '-' jika data tidak ada
                fnRowCallback: function (row, data, index) {

                },

            };

            config.columnDefs.push({
                targets: 0,
                orderable: false,
                width: "50px", // Mengatur lebar kolom nomor urut
                render: function (data, type, full, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            });

            // Inisialisasi DataTable
            var dt = $(config.el).DataTable($.extend(true, xdefault, config));

            // Penanganan pencarian custom
            // setTimeout(() => {
            //     if (config.searching) {
            //         const filterSearch = document.querySelector(`[data-kt-filter="${config.el_search}"]`);
            //         filterSearch.addEventListener('keypress', function (e) {
            //             if (e.key === 'Enter') {
            //                 dt.search(e.target.value).draw();
            //             }
            //         });
            //     }
            // }, 500);

            return dt;
        },

    };
})({ defaultOption: true }); // Mengirimkan objek config saat IIFE dipanggil


// Menggunakan metode save


function checkSession() {
    // axios.get('/session/check')
    //     .then(function (response) {
    //         if (response.data.loggedIn) {
    //             console.log('Session is active');
    //             // Sesi masih aktif, lakukan sesuatu
    //         } else {
    //             console.log('Session is inactive');
    //             // Sesi tidak aktif, arahkan pengguna untuk login atau tampilkan pesan
    //             // window.location.href = '/login'; // atau tampilkan modal/pesan
    //         }
    //     })
    //     .catch(function (error) {
    //         console.error('Error checking session:', error);
    //     });
}

document.addEventListener('DOMContentLoaded', function () {
    console.log('load')
    setInterval(checkSession(), 300000); // Cek setiap 5 menit
});
