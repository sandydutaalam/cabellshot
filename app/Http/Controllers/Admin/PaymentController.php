<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_proof_type' => 'required',
        
        ]);

        Payment::create([
            'payment_proof_type' => $request->input('payment_proof_type'),
        
        ]);

        return redirect()->route('admin.payments.index')->with('success', 'New payment add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'payment_proof_type' => 'required',
                
        ]);

        $payment = Payment::find($id);

        // Handle the image replacement
        // if ($request->hasFile('categoryImage')) {
        //     $newFileName = $this->fileService->replaceFile($request->file('categoryImage'), $event_type->category_img);
        //     $event_type->category_img = $newFileName;
        // }

        // Update service details
        $payment->payment_proof_type = $request->input('payment_proof_type');
        $payment->save();

        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Payment: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id); // Find event type or fail
            $payment->delete(); // Delete the event type

            return redirect()->route('admin.payments.index')->with('success', 'Berhasil menghapus tipe pembayaran!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus tipe pembayaran: ' . $e->getMessage());
        }
    }
}
