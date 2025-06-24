<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    /**
     * Criptografa dados sensíveis
     */
    public function encrypt($data)
    {
        if (is_array($data)) {
            return array_map([$this, 'encrypt'], $data);
        }
        
        if (is_string($data)) {
            return Crypt::encryptString($data);
        }
        
        return $data;
    }

    /**
     * Descriptografa dados sensíveis
     */
    public function decrypt($data)
    {
        if (is_array($data)) {
            return array_map([$this, 'decrypt'], $data);
        }
        
        if (is_string($data)) {
            try {
                return Crypt::decryptString($data);
            } catch (\Exception $e) {
                return $data; // Retorna o dado original se não for possível descriptografar
            }
        }
        
        return $data;
    }

    /**
     * Gera um hash seguro
     */
    public function hash($data)
    {
        return hash('sha256', $data . config('app.key'));
    }

    /**
     * Verifica um hash
     */
    public function verifyHash($data, $hash)
    {
        return hash_equals($this->hash($data), $hash);
    }
}
