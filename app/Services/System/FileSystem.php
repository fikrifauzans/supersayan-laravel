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
        // dd($description);
        $val = Files::create($this->dataFile);
        return $val;
    }



    public function updateFile($id, $request, $field = '', $status = 'update')
    {
        // try {
        if ($request->file($field) != null) {
            $file = Files::find($id);


            // Hapus Gambar ================================================
            $existingFile = public_path('storage/' . $file['name']);
            if (file_exists($existingFile)) unlink($existingFile);
            // Simpan Gamba ================================================
            $this->moveImage($request, $field);
            if ($file['reference_id'] == "null") $file->reference_id = null;
            // Ubah Info Gambar ============================================
            $file->name             =       $this->dataFile['name'] ?? null;
            $file->directory        =       $this->dataFile['directory'] ?? null;
            $file->path             =       $this->dataFile['path'] ?? null;
            $file->description      =       $this->dataFile['description'] ?? null;
            $file->save();
            return $file;
        } else if ($status == "delete") {
            $file = Files::find($id);
            $existingFile = public_path('storage/' . $file['name']);
            if (file_exists($existingFile)) unlink($existingFile);
            $file->name      =       null;
            $file->directory =       null;
            $file->path      =       null;
            $file->save();
        } else {
            $file =  Files::find($id);
            if ($request['description'] != null) $file->description = $request['description'];
            if ($request['name']        != null) $file->name = $request['name'];
            if ($request['directory']   != null) $file->directory = $request['directory'];
            if ($request['path']        != null) $file->path = $request['path'];
            $file->save();
        }
        // } catch (\Throwable $th) {
        //     return $th;
        // }
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
