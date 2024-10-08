/**
 * Penulisan var APP = ((config) => { ... })(); 
 * adalah contoh dari Immediately Invoked Function Expression (IIFE) dalam JavaScript, 
 * yang sering digunakan untuk membuat modul atau ruang lingkup lokal untuk variabel dan fungsi
 */
var APP = ((config) => {
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.baseURL = '/api'; // Set base URL untuk semua permintaan

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
