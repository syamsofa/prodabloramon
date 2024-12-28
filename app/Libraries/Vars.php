<?php

namespace App\Libraries;

use Stringable;

class Vars
{
    const SEC_KEY='d7f87df8u45igu8dyuiy485rgfuihd';
 
    public function enkripsi($string)
    {
        $simple_string = $string;


        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        // $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "prodablora@bangkit";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $simple_string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        // Display the encrypted string
        return $encryption;
    }
    public function dekripsi($string)
    {
        $decryption_iv = '1234567891011121';
        $ciphering = "AES-128-CTR";
        // Store the decryption key
        $decryption_key = "prodablora@bangkit";
        $options = 0;

        // Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt(
            $string,
            $ciphering,
            $decryption_key,
            $options,
            $decryption_iv
        );

        // Display the decrypted string
        return $decryption;
    }
}
