<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = "
        <h1>Aplikasi Kontak</h1>
        <div>
            <a href='/contacts'>Kontak</a>
            <a href='/contacts/create'>Kontak Baru</a>
            <a href='/contacts/2'>Tampilkan Kontak</a>
            <a href='/contacts/Azzam'>Tampilkan Nama</a>
        </div>
    ";
    return $html;
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function() {
        return "list kontak di sini";
    })->name('contacts.index');
    
    Route::get('/contacts/create', function() {
        return "Tambah kontak baru di sini";
    })->name('contacts.create');
    
    Route::get('/contacts/{id}', function($id) {
        return "Ini Kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');
    
    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "Nama Perusahaan: " . $name;
        } else {
            return "Nama Perusahaan Kosong";
        }
    })->whereAlphaNumeric('name')->name('companies');
});