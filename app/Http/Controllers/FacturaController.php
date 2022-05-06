<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facturapi\Facturapi;
use Illuminate\Support\Facades\Storage;

class FacturaController extends Controller
{
    private $apiKey = "sk_test_jQqJRlPYOzBnwoYxWVqEWnw4yEXveL70";
    public function index()
    {
        return view('factura.index');
    }
    public function listFacturas()
    {
        $servicio = new Facturapi($this->apiKey);
        $facturas = $servicio->Invoices->all();

        return response()->json(["facturas"=>$facturas->data]);
    }
    public function decargarArchivos(Request $request)
    {
        $servicio = new Facturapi($this->apiKey);
        $pdf = $servicio->Invoices->download_zip($request->id);
        Storage::disk('local')->put($request->id.'.zip', $pdf);
        return response()->download($request->id.'.zip',$request->id.'.zip');
        //response()->download($file);
    }
    public function enviarArchivos(Request $request)
    {
        $servicio = new Facturapi($this->apiKey);
        $servicio->Invoices->send_by_email($request->id,'j.a.espinares.romero@hotmail.com');
    }
}
