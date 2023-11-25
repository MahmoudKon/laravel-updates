<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('do/update', function(Request $request) {
    $row = (object) $request->row;
    $path = str_replace('/', DIRECTORY_SEPARATOR, base_path($row->path));

    if (! file_exists($path)) {
        mkdir($path, 7777, true);
    }

    config()->set('backup.backup.source.files.include', [$path]);
    \Illuminate\Support\Facades\Artisan::call("backup:run --only-files");
    \Illuminate\Support\Facades\Artisan::call("migrate");
    \Illuminate\Support\Facades\Artisan::call("optimize:clear");

    $full_path = $path.DIRECTORY_SEPARATOR.last( explode('\\', $row->file) );
    exec("icacls $path");
	copy($row->file, $full_path);

    $zip = new ZipArchive();
    if (! $zip->open($full_path)) {
        dd('error');
    } else {
        $zip->extractTo($path);
        $zip->close();
        unlink($full_path);
    }
    return back();
})->name('api.do.update');
