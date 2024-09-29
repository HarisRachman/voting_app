<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Order;
use App\Models\Candidate;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use DB;

class VoteController extends Controller
{

    public function __construct() {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }
    
    public function store(Request $request) {

        $vote = new Vote;
        $vote->candidate_id = $request->id_candidate;
        $vote->nama_voter = $request->nama_voter;
        $vote->telp_voter = $request->telp_voter;
        $vote->jml_vote = $request->jml_vote;
        $vote->save();

        $last_vote = Vote::orderby('id', 'desc')->first();

        $no_transaction = 'Inv-' . rand();
        $order = new Order;
        $order->vote_id = $last_vote->id;
        $order->external_id = $no_transaction;
        $order->no_transaction = $no_transaction;
        $order->amount = $request->amount;

        $createInvoice = new CreateInvoiceRequest([
            'external_id' => $no_transaction,
            'amount' => $request->amount,
            'description' => 'Test Invoice',
            'invoice_duration' => 86400,
            'currency' => 'IDR',
        ]);

        $apiInstance = new InvoiceApi();
        $generateInvoice = $apiInstance->createInvoice($createInvoice);

        $order->invoice_url = $generateInvoice['invoice_url'];
        $order->save();

        $last_order = Order::orderby('id', 'desc')->first();
        $candidate = Candidate::where('id', $last_vote->candidate_id)->first();

        // return view('payment',compact('last_order', 'candidate', 'last_vote'));
        session(['last_order' => $last_order, 'candidate' => $candidate, 'last_vote' => $last_vote]);
        return redirect()->route('paymentView');
    }

    public function notificationCallback(Request $request) {
        $getToken = $request->headers->get('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        try {
            $order = Order::where('external_id', $request->external_id)->first();
            $vote = Vote::where('id', $order->vote_id)->first();
            $candidate = Candidate::where('id', $vote->candidate_id)->first();

            if(!$callbackToken) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Callback token xendit not exists'
                ], Response::HTTP_NOT_FOUND);
            }

            if($getToken !== $callbackToken) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Token callback invalid'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            if($order) {
                if ($request->status === 'PAID') {
                    $order->update([
                        'status' => 'Completed'
                    ]);
                    $vote->update([
                        'status' => 'Valid'
                    ]);
                    $total_vote = Vote::select(DB::raw('SUM(jml_vote) as vote'))->where('status', 'Valid')
                            ->where('candidate_id', $vote->candidate_id)
                            ->groupBy('candidate_id')->first();
                    $candidate->update([
                        'jml_vote' => (int)$total_vote->vote
                    ]);
                } else {
                    $order->update([
                        'status' => 'Failed'
                    ]);
                    $vote->update([
                        'status' => 'Invalid'
                    ]);
                }
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'callback sent'
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
