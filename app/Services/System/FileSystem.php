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
        if ($module       != "null")  $this->dataFile['module']       = $module;
        if ($reference_id != "null")  $this->dataFile['reference_id'] = $reference_id;
        if ($description  != "null")  $this->dataFile['description']  = $description;
        if ($description  != "null")  $this->dataFile['reference_table']  = $reference_table;

        $val = Files::create($this->dataFile);
        return $val;
    }



    public function updateFile($id, $request, $field = '', $status = 'update')
    {
        if ($request->file($field) != null) {
            $file = Files::find($id);
            // try {
            // Hapus Gambar ================================================
            // dd($file['name'] != null);
            if ($file['name'] != null) unlink(public_path('storage/' . $file['name']));
            // Simpan Gamba ================================================
            $this->moveImage($request, $field);

            if ($file['reference_id'] == "null") $file->reference_id = null;
            // Ubah Info Gambar ============================================
            $file->name      =       $this->dataFile['name'];
            $file->directory =       $this->dataFile['directory'];
            $file->path      =       $this->dataFile['path'];
            $file->save();
            return $file;
            // } catch (\Throwable $th) {
            // return $th;
            // }
        } else if ($status == "delete") {
            $file = Files::find($id);
            unlink(public_path('storage/' . $file['name']));
            $file->name      =       null;
            $file->directory =       null;
            $file->path      =       null;
            $file->save();
        }
    }

    public function forceFile($id)
    {
        $file = $this->findId($id, true);
        try {
            unlink(public_path('storage/' . $file['name']));
            $file->forceDelete();
            return true;
        } catch (\Throwable $th) {
            $file->forceDelete();
            return true;
        }
    }
}
