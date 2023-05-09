<?php

namespace App\Service\System;

use App\Models\Files;

trait FileSystem
{
    public function moveImage(
        $request,
        $field = '',

    ) {
        // Kalo ada file dengan $field -> 'file'
        if ($request->file($field) != null) {
            $file = $request->file($field);
            // Initial Dir Path ======================================
            $destinationPath = 'storage';
            // Initial File Name =====================================
            $fileName = '';
            $fileName =  $fileName . date('YmdHis');
            $fileName =  $fileName . '_';
            $fileName =  $fileName . $file->getClientOriginalName();
            // Initial Public URL ====================================
            $publicUrl =  url('/');
            $publicUrl =  $publicUrl . '/' . $destinationPath;
            $publicUrl =  $publicUrl . '/' . $fileName;
            // Initial Dir Path =======================================
            $dir = storage_path('app/public/' . $fileName);
            $file->move($destinationPath, $fileName);
            // ========================================================
            $this->dataFile['name']       = $fileName;
            $this->dataFile['directory']  = $dir;
            $this->dataFile['path']       = $publicUrl;
            return $this;
        }
    }


    public function storeFile(
        $reference_id = 0,
        $module       = '',
        $description  = '',
        $reference_table  = '',
    ) {
        if ($module       != null)  $this->dataFile['module']       = $module;
        if ($reference_id != null)  $this->dataFile['reference_id'] = $reference_id;
        if ($description  != null)  $this->dataFile['description']  = $description;
        if ($description  != null)  $this->dataFile['reference_table']  = $reference_table;

        $val = Files::create($this->dataFile);
        return $val;
    }



    public function updateFile($id, $request, $field = '')
    {

        if ($request->file($field) != null) {
            $file = Files::find($id);
            try {
                // Hapus Gambar ================================================
                unlink($file->directory);
                // Simpan Gamba ================================================
                $this->moveImage($request, $field);

                if ($file['rereference_id'] == null) $file->reference_id = '0';
                // Ubah Info Gambar ============================================
                $file->name      =       $this->dataFile['name'];
                $file->directory =       $this->dataFile['directory'];
                $file->path      =       $this->dataFile['path'];
                $file->save();
                return $file;
            } catch (\Throwable $th) {
                return $file;
            }
        }
    }

    public function forceFile($id)
    {
        $file = $this->findId($id, true);
        try {
            unlink($file['directory']);
            $file->forceDelete();
        } catch (\Throwable $th) {
            $file->forceDelete();
        }
    }
}
