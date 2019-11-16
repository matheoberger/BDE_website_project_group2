<?php

namespace App\Http\Controllers;

use PDF;
use PDO;
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
        $zip = new ZipArchive();
        $filename = "./BDEpictures.zip";
        if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
            exit("cannot open <$filename>\n");
        }
        $dir = public_path() . '/images';
        // Create zip
        createZip($zip, $dir);
        $zip->close();
    }

    function createZip($zip, $dir)
    {
        if (is_dir($dir)) {
            if ($repository = opendir($dir)) {
                while (($file = readdir($repository)) !== false) {
                    if (is_file($dir . $file)) {
                        $zip->addFile($dir . $file);
                    }
                }
                closedir($repository);
            }
        }
    }


    public function downloadCSV($id)
    {
        $users = loadData($id);
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

    //composer require barryvdh/laravel-dompdf
    public function downloadPDF($id)
    {
        $data = DownloadController::loadData($id);
        $pdf = PDF::loadView('emails/pdf', ['data' => $data]);
        return $pdf->download("event$id.pdf");
    }
}