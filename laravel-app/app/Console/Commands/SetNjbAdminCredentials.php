<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

#[Signature('njb:admin:setup')]
#[Description('Set the local NJB Smart School admin credentials')]
class SetNjbAdminCredentials extends Command
{
    public function handle(): int
    {
        $email = mb_strtolower(trim((string) $this->ask('Email admin')));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Masukkan alamat email yang valid.');

            return self::FAILURE;
        }

        $password = (string) $this->secret('Buat kata sandi admin (minimal 12 karakter)');

        if (strlen($password) < 12) {
            $this->error('Kata sandi harus terdiri dari minimal 12 karakter.');

            return self::FAILURE;
        }

        $confirmation = (string) $this->secret('Ulangi kata sandi admin');

        if (! hash_equals($password, $confirmation)) {
            $this->error('Kata sandi yang dimasukkan belum sama. Jalankan perintah ini lagi.');

            return self::FAILURE;
        }

        $envPath = base_path('.env');

        if (! is_file($envPath) || ! is_writable($envPath)) {
            $this->error('File .env tidak ditemukan atau tidak bisa ditulis.');

            return self::FAILURE;
        }

        $contents = file_get_contents($envPath);

        if ($contents === false) {
            $this->error('File .env tidak dapat dibaca.');

            return self::FAILURE;
        }

        $values = [
            'NJB_ADMIN_EMAIL' => $email,
            'NJB_ADMIN_PASSWORD_HASH' => Hash::make($password),
        ];

        foreach ($values as $key => $value) {
            $line = $key."='".$value."'";
            $pattern = '/^'.preg_quote($key, '/').'=.*/m';

            if (preg_match($pattern, $contents) === 1) {
                $contents = preg_replace_callback(
                    $pattern,
                    static fn (): string => $line,
                    $contents,
                    1
                );
            } else {
                $contents = rtrim($contents).PHP_EOL.$line.PHP_EOL;
            }
        }

        if (file_put_contents($envPath, $contents, LOCK_EX) === false) {
            $this->error('Kredensial admin tidak dapat disimpan.');

            return self::FAILURE;
        }

        $this->info('Email admin dan kata sandi tersimpan dengan aman di .env.');
        $this->line('Sekarang mulai ulang server Laravel agar perubahan terbaca.');

        return self::SUCCESS;
    }
}
