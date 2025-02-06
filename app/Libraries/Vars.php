<?php

namespace App\Libraries;

use Stringable;

class Vars
{
    const SEC_KEY = 'd7f87df8u45igu8dyuiy485rgfuihd';
    const IV = '1234567812345678';
    const CIP = "AES-128-CTR";
    const OPTIONS = 0;
    public function enkripsi($string, $encryption_key)
    {

        $encryption = openssl_encrypt(
            $string,
            $this::CIP,
            $encryption_key,
            $this::OPTIONS,
            $this::IV
        );

        // Display the encrypted string
        return $encryption;
    }
    public function dekripsi($string,$encryption_key)
    {
        $decryption = openssl_decrypt(
            $string,
            $this::CIP,
            $encryption_key,
            $this::OPTIONS,
            $this::IV
        );

        // Display the decrypted string
        return $decryption;
    }
}
