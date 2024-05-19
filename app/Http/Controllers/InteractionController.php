<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index()
    {
        return Interaction::join('customers', 'customers.id', '=', 'interactions.customer_id')
            ->select('interactions.*', 'customers.name as customer_name', 'customers.email as customer_email') // pilih kolom yang ingin ditampilkan dari tabel customers
            ->get();
    }

    public function store(Request $request)
    {
        $interaction = Interaction::create($request->all());

        $updatedInteraction = Interaction::join('customers', 'customers.id', '=', 'interactions.customer_id')
            ->select('interactions.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->where('interactions.id', $interaction->id)
            ->first();
        return response()->json($updatedInteraction, 201);
    }

    public function show($id)
    {
        return Interaction::find($id);
    }

    public function update(Request $request, $id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->update($request->all());

        $updatedInteraction = Interaction::join('customers', 'customers.id', '=', 'interactions.customer_id')
            ->select('interactions.*', 'customers.name as customer_name', 'customers.email as customer_email')
            ->where('interactions.id', $id)
            ->first();

        return response()->json($updatedInteraction, 200);
    }

    public function delete($id)
    {
        Interaction::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
