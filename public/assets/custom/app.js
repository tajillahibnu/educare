/**
 * Penulisan var APP = ((config) => { ... })(); 
 * adalah contoh dari Immediately Invoked Function Expression (IIFE) dalam JavaScript, 
 * yang sering digunakan untuk membuat modul atau ruang lingkup lokal untuk variabel dan fungsi
 */
var APP = ((config) => {
    return {
        save: (config) => {
            console.log("Saving with config:", config);
            // logika untuk menyimpan data
        }
    };
})({ defaultOption: true }); // Mengirimkan objek config saat IIFE dipanggil

// Menggunakan metode save


function checkSession() {
    console.log('Session is active');
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
