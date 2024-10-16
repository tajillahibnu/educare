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
            if (error.response) {
                const status = error.response.status;

                if (status === 422) {
                    // Menangani error validasi Laravel
                    const errors = error.response.data.errors;
                    if (errors) {
                        // Loop melalui error dan tampilkan toastr untuk setiap pesan
                        Object.keys(errors).forEach(field => {
                            errors[field].forEach(message => toastr.error(message));
                        });
                    } else {
                        // Pesan default jika tidak ada pesan spesifik dari Laravel
                        toastr.error("Data yang Anda masukkan tidak valid. Silakan periksa input Anda.");
                    }
                } else if (errorHandlers[status]) {
                    // Panggil handler untuk status kode yang sesuai
                    errorHandlers[status]();
                } else {
                    // Untuk status error lainnya, tampilkan pesan error default
                    const message = error.response.data.message || "Terjadi kesalahan, silakan coba lagi.";
                    toastr.error(message, `Error ${status}`);
                }
            } else {
                // Untuk error tanpa response dari server
                toastr.error("Gagal terhubung ke server. Silakan coba lagi nanti.");
            }
            return Promise.reject(error);

            // if (error.response && errorHandlers[error.response.status]) {
            //     // Panggil handler untuk status kode yang sesuai
            //     errorHandlers[error.response.status]();
            // } else {
            //     // Tampilkan error yang tidak terdaftar
            //     console.error("Unhandled Error:", error.response ? error.response.status : error);
            // }
            // return Promise.reject(error);
        }
    );

    return {
        decodeEntities: (encodedString) => {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = encodedString;
            return textArea.value;
        },
        // Fungsi umum untuk permintaan data menggunakan Axios
        axiosRequest: (config) => {
            config = $.extend(true, {
                method: 'post', // Metode default untuk penyimpanan adalah POST
                headers: {},
            }, config);

            if (config.data instanceof FormData) {
                config.headers['Content-Type'] = 'multipart/form-data';
            } else {
                // Jika menggunakan serialize(), konversi data menjadi URL-encoded
                config.data = $.param(config.data);
                config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
            }

            console.log(config.headers)

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
        // Fungsi untuk mereload DataTable
        reloadTable: (config) => {
            config = $.extend(true, {
                el: '#maintable',
            }, config);

            // Ambil instance DataTable berdasarkan elemen yang diberikan
            var dataTable = $(config.el).DataTable();
            dataTable.ajax.reload(null, false); // Mereload data tanpa mengganti halaman
        },
        // Fungsi untuk menghancurkan DataTable
        destroyTable: (config) => {
            config = $.extend(true, {
                el: '#maintable',
            }, config);

            // Pastikan DataTable ada sebelum mencoba menghancurkannya
            if ($.fn.DataTable.isDataTable(config.el)) {
                var dataTable = $(config.el).DataTable();
                dataTable.clear().destroy(); // Hancurkan tabel dan hapus data
                console.log("DataTable destroyed.");
            } else {
                console.warn("DataTable not initialized, cannot destroy.");
            }
        },
        confirm: (config) => {
            // Menggabungkan konfigurasi default dengan konfigurasi yang diberikan
            config = $.extend(
                true,
                {
                    title: 'Confirmation',
                    text: "Do you want to proceed?",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light',
                        cancelButton: 'btn btn-outline-secondary waves-effect'
                    },
                    buttonsStyling: false,
                },
                config
            );
            // Mengembalikan promise untuk mendukung penggunaan .then di luar
            return Swal.fire(config);
        }
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

class Queue {
    constructor() {
        this.queue = [];
        this.isRunning = false;
    }

    enqueue(callback, delay = 0) {
        this.queue.push({ callback, delay });
        return this;
    }

    dequeue() {
        if (this.queue.length === 0) {
            this.isRunning = false;
            return;
        }

        this.isRunning = true;
        const { callback, delay } = this.queue.shift();

        setTimeout(() => {
            callback(() => this.dequeue());
        }, delay);
    }

    dequeueAll() {
        if (!this.isRunning) {
            this.dequeue();
        }
    }

    clearQueue() {
        this.queue = [];
        this.isRunning = false;
    }
}
