<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Midtrans\Config;
use App\Models\FilmModel;
use App\Models\PenggunaModel;
use App\Models\jadwalModel;
use App\Models\kursiModel;
use App\Models\transaksiModel;
use CodeIgniter\Database\Query;
class payment extends BaseController
{
    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-kaU5ecOo0MS9fvKlOie9BGOr';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 40000,
            )
        ];
        $data =[
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];
        echo view('payment/pay', $data);
    }
}
