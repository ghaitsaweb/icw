<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route; 

class PDFController extends Controller
{
        public function generatePDF()
    {   //echo url('/images/1577416000.jpg'); exit();
        //echo public_path(); 
        //echo public_path('images/1577416000.jpg'); exit();
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
         //PDF::loadView('myPDF', $data);
         $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('myPDF');
    
        return $pdf->download('Users.pdf');


        // $pdf = PDF::loadView('myPDF')->setPaper([0, 0, 250,350], 'landscape');
        // return $pdf->download('voucher.pdf');
//         $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
// //dd($qrcode);
// $reff_id ='qweqe';
//                     QrCode::size(100)
//                     ->format('png')
//                     ->generate($reff_id, public_path('images/'.$reff_id.'.png'));
//$url = route('/akun/detailkartu/'); dd($url);
// $reff_id1 ='http://fc.indociptawisesa.co.id/akun/detailkartu/1';//dd($reff_id);
// $reff_id ='qweqe';
// $generateqrcode = QrCode::size(100)
//         ->format('png')
//         ->generate($reff_id1, public_path('qrcode/'.$reff_id.'.png'));

// $image = QrCode::format('png')
//                  ->merge('images/1577416000.jpg', 0.1, true)
//                  ->size(200)->errorCorrection('H')
//                  ->generate('A simple example of QR code!');
// $output_file = 'images' . time() . '.png';dd($image ,$output_file);
// // Storage::putFile(
// //     'public/images',
// //     $image);
// $j = Storage::disk('public')->put($output_file, $image);  dd($image ,$output_file, $j);

// $path = '/imgreq';
// $file_path = $path . time() . '.png';
// $image = \QrCode::format('png')
//                  ->merge('images/1577416000.jpg', 0.1, true)
//                  ->size(200)->errorCorrection('H')
//                  ->generate('A simple example of QR code!', $file_path)

// $data->field_name = $file_path;
// $data->save();

    }
}
