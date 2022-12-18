<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PaymentController extends Controller
{
    //
    // This function for handling payment from paytabs package
    public function create_payment($total)
    {
        $pay= paypage::sendPaymentCode('all')
            ->sendTransaction('sale')
            ->sendCart(1,$total,'Buying')
            ->sendCustomerDetails('', '', '', '', '', '', '', '','100.279.20.10')
            ->sendURLs(env('APP_URL').'/handle_payment', '')
            ->sendLanguage('en')
            ->create_pay_page();
        // return the payment url to the user then redirect it.
        return $pay;
    }

    public function handle_payment(Request $request){

        $invoice = Paypage::queryTransaction($request->tranRef);
        $systemInvoice = new Invoice();

        // fill the invoice
        $systemInvoice->invoice_type = "sales";
        $systemInvoice->tran_ref = $invoice->tran_ref;
        $systemInvoice->tran_type = $invoice->tran_type;
        $systemInvoice->cart_description = $invoice->cart_description;
        $systemInvoice->cart_currency = $invoice->cart_currency;
        $systemInvoice->cart_amount = $invoice->cart_amount;
        $systemInvoice->customer_name = $invoice->customer_details->name;
        $systemInvoice->customer_email = $invoice->customer_details->email;
        $systemInvoice->customer_ip = $invoice->customer_details->ip;
        $systemInvoice->payment_response_status = $invoice->payment_result->response_status;
        $systemInvoice->payment_response_code = $invoice->payment_result->response_code;
        $systemInvoice->payment_response_message = $invoice->payment_result->response_message;
        $systemInvoice->payment_transaction_time = $invoice->payment_result->transaction_time;
        $systemInvoice->payment_info_payment_method = $invoice->payment_info->payment_method;
        $systemInvoice->payment_info_card_type = $invoice->payment_info->card_type;
        $systemInvoice->payment_info_payment_description = $invoice->payment_info->payment_description;
        $systemInvoice->payment_info_expiryMonth = $invoice->payment_info->expiryMonth;
        $systemInvoice->payment_info_expiryYear = $invoice->payment_info->expiryYear;
        $systemInvoice->success = $invoice->success;
        $systemInvoice->transaction_id = $invoice->transaction_id;
        $systemInvoice->message = $invoice->message;
        $systemInvoice->save();

        if($invoice->payment_result->response_status == "A" && $invoice->success == true){ // payment successes
            //alert
            alert()->success('SuccessAlert','تمت شراء الكتاب بنجاح');
            return redirect()->route('home.index');
        }
        return $invoice;



    }
}
