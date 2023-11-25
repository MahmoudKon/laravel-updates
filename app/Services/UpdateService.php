<?php
namespace App\Services;

use App\Models\Update;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            $this->uploadLink($data);
            $this->upload($data,  $data['file'] ?? null );

            return Update::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }

    protected function uploadLink(array &$data):void
    {
        if (!$data['link']) return ;
        $url = str_replace('\\', '/', $data['link']);

        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        Storage::put($name, $contents);

        $data['size']      = Storage::fileSize($name);
        $data['name']      = $name;
        $data['extension'] = last( explode('.', $name) );
        Storage::delete($name);
    }

    protected function upload(array &$data, ?UploadedFile $file = null): void
    {
        if (! $file) return;

        $data['size']      = $file->getSize();
        $data['name']      = $file->getClientOriginalName();
        $data['extension'] = $file->getClientOriginalExtension();
        $data['file']      = $file->hashName();
        $file->move(Update::UPLOAD_PATH, $data['file']);
    }
}
