<?php

namespace App\Http\Controllers;

use PDF;
use PDO;
use File;
use ZipArchive;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    static function loadData($id)
    {
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `getRegisteredFromEvent`(:id);");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $users = $requete->fetchAll();
        $requete->closeCursor();
        return $users;
    }

    public function downloadAll()
    {
        if (session('role') ==  "Administrator" || session('role') ==  "Moderator") {
            $zip = new ZipArchive();
            $filename = public_path() . "/images/";
            $zipName = "BDEpictures.zip";
            $filetopath = public_path() . '/' . $zipName;
            if (file_exists($filetopath)) {
                File::delete($filetopath);
            }
            $zip = new ZipArchive();
            if ($zip->open($filetopath, ZipArchive::CREATE) === TRUE) {
                $files = scandir($filename);
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        $zip->addFile($filename . $file, "images/$file");
                    }
                }
                //return view('login', ['error' => $zip]);
                $zip->close();
            }
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );

            // Create Download Response
            if (file_exists($filetopath)) {
                return response()->download($filetopath, $zipName, $headers);
            }
        }
    }




    public function downloadCSV($id)
    {
        if (session('role') ==  "Administrator") {
            $users = DownloadController::loadData($id);
            if (!empty($users)) {
                $i = 0;
                foreach ($users as $user) {
                    $csvData[$i]["firstname"] = $users[$i]["firstname"];
                    $csvData[$i]["lastname"] = $users[$i]["lastname"];
                    $csvData[$i]["email"] = $users[$i]["email"];
                    $csvData[$i]["center"] = $users[$i]["center"];
                    $csvData[$i]["gender"] = $users[$i]["gender"];
                    $csvData[$i]["birthdate"] = $users[$i]["birthdate"];
                    $i++;
                }
                $filename = "event$id";
                header("Content-disposition: attachment; filename=$filename.csv");
                header("Content-Type: text/csv");
                $output = fopen("php://output", 'w');
                fputs($output, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
                fputcsv($output, array_keys($csvData[0]), ';', '"');
                foreach ($csvData as $user) {
                    fputcsv($output, $user, ';', '"');
                }
                fclose($output);
                die();
            }
            return back();
        }
    }

    //composer require barryvdh/laravel-dompdf
    public function downloadPDF($id)
    {
        if (session('role') ==  "Administrator") {
            $data = DownloadController::loadData($id);
            $pdf = PDF::loadView('emails/pdf', ['data' => $data]);
            return $pdf->download("event$id.pdf");
        }
    }

    public function download($id, Request $request)
    {
        if (session('role') ==  "Administrator") {
            switch ($request->input('format')) {
                case 'csv':
                    return redirect()->action(
                        'DownloadController@downloadCSV',
                        ['id' => $id]
                    );
                    break;
                case 'pdf':
                    return redirect()->action(
                        'DownloadController@downloadPDF',
                        ['id' => $id]
                    );
                    break;
            }
        }
    }
}
