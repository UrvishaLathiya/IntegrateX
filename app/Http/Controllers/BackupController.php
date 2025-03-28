<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    public function downloadBackup()
{
    $fileName = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';
    $filePath = storage_path('app/' . $fileName);

    // Use correct MySQL port (3307)
    $dbHost = env('DB_HOST', '127.0.0.1');
    $dbName = env('DB_DATABASE');
    $dbUser = env('DB_USERNAME');
    $dbPass = env('DB_PASSWORD');
    $dbPort = env('DB_PORT', '3307'); // Change if different

    // Backup command with correct port
    $command = "\"C:\\xampp\\mysql\\bin\\mysqldump\" --host=$dbHost --port=$dbPort --user=$dbUser --password=$dbPass $dbName --complete-insert --routines --triggers --events > \"$filePath\"";

    // Execute command
    $resultCode = null;
    exec($command, $output, $resultCode);

    if ($resultCode !== 0) {
        return back()->with('error', 'Database backup failed.');
    }

    // Download and delete after sending
    return response()->download($filePath)->deleteFileAfterSend(true);
}

}
