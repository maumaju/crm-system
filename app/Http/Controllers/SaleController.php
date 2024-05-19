<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class SaleController extends Controller
{
    public function index()
    {
        // return Sale::all();
        return Sale::join('customers', 'customers.id', '=', 'sales.customer_id')
            ->select('sales.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->get();
    }

    public function store(Request $request)
    {
        $sale = Sale::create($request->all());
        $updatedSale = Sale::join('customers', 'customers.id', '=', 'sales.customer_id')
            ->select('sales.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->where('sales.id', $sale->id)
            ->first();
        return response()->json($updatedSale, 201);
    }

    public function show($id)
    {
        return Sale::find($id);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        $updatedSale = Sale::join('customers', 'customers.id', '=', 'sales.customer_id')
            ->select('sales.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->where('sales.id', $id)
            ->first();

        return response()->json($updatedSale, 200);
    }

    public function delete($id)
    {
        Sale::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function invoices($id)
    {
        // $sale = Sale::find($id);
        $sale = Sale::join('customers', 'customers.id', '=', 'sales.customer_id')
            ->select('sales.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->where('sales.id', $id)
            ->first();
        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $pdf = new Dompdf();
        $pdf->loadHtml(view('invoices.invoice_template', ['sale' => $sale])->render());

        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $pdf->setOptions($options);

        $pdf->render();
        return $pdf->stream('invoice_' . $id . '.pdf');
    }
}
