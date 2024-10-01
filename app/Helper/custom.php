<?php
// app/helpers.php

if (!function_exists('encryptData')) {
    function encryptData($data)
    {
        // Menggunakan base64_encode
        return base64_encode($data);

        // Jika ingin menggunakan Laravel Crypt
        // return Crypt::encryptString($data);
    }
}

if (!function_exists('decryptData')) {
    function decryptData($data)
    {
        // Menggunakan base64_decode
        return base64_decode($data);

        // Jika ingin menggunakan Laravel Crypt
        // return Crypt::decryptString($data);
    }
}
