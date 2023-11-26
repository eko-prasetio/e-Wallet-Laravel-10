<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TopUpController extends Controller
{
    public function store(Request $request) {
        // $data = $request->all(); // to get data all
        $data = $request->only('amount','pin','payment_method_code'); // to get data by spesifik
        $validator = Validator::make($data,
        [
            'amount' => 'required|integer|min:10000',
            'pin' => 'required|digits:6',
            'payment_method_code' => 'required|in:bni_va,bca_va,bri_va',
        ]);
        if ($validator->fails()) {
            return response()->json(['erros' => $validator->messages()], 400);
        }
        $pinChecker = pinChecker($request->pin);
        
        if (!$pinChecker) {
            return response()->json(['message' => ' Your Pin is wrong']);
        }

        $transactionType = TransactionType::where('code','top_up')->first();
        $paymentMethod = PaymentMethod::where('code', $request->payment_method_code)->first();

        DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'payment_method_id' => $paymentMethod->id,
                'transaction_type_id' => $transactionType->id,
                'amount' => $request->amount,
                'transaction_code' => strtoupper(Str::random(10)),
                'description' => 'Top Up Vie'.$paymentMethod->name,
                'status' => 'pending'
            ]);

            //call to midtrans
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
