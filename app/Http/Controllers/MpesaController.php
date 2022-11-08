<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;
use Safaricom\Mpesa\Mpesa;
use App\Models\Transaction;

class MpesaController extends Controller
{

    public function index()
    {
        return view('Payment.index');
    }
    public function getAccessToken(){

    $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return  $response;
    }
    public function Stk()
     {
    // $user_phone=Auth::user()->phone;
         $mpesa= new Mpesa();
          $BusinessShortCode=174379;
          $LipaNaMpesaPasskey="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
          $TransactionType="CustomerPayBillOnline";
          $Amount="1";
          $PartyA="254712135643";
          $PartyB=174379;
          $PhoneNumber="254712135643";
          $CallBackURL="https://c956-197-232-61-203.in.ngrok.io/api/callbackurl";
          $AccountReference="labfinder";
          $TransactionDesc="labowner payments";
          $Remarks="Thank you for transacting with us";

    $stkPushSimulation=$mpesa->STKPushSimulation(
          $BusinessShortCode,
          $LipaNaMpesaPasskey,
          $TransactionType,
          $Amount,
          $PartyA,
          $PartyB,
          $PhoneNumber,
          $CallBackURL,
          $AccountReference,
          $TransactionDesc,
          $Remarks);
          return back()->with('success','mpesa stk push initiated succesfully,check your phone to complete the payment');
  }

  public function response(Request $request)
  {
    $response=json_decode($request->getContent());
    Log::info(json_encode($response));

    $resData=$response->Body->stkCallback->CallbackMetadata;
    $amountPaid = $resData ->Item[0]->Value;
    $mpesaTransactionId = $resData ->Item[1]->Value;
      $mpesaTransactiontime= $resData ->Item[3]->Value;
       $paymentPhoneNumber = $resData ->Item[4]->Value;

       $transaction= new Transaction;
       $transaction->amount=$amountPaid;
       $transaction->purpose='License Application';
       $transaction->date=$mpesatransactiontime;
       $transaction->status='Paid';
       $transaction->reference_number=$mpesaTransactionId;
       $transaction->phone_number=$paymentPhoneNumber;
       $transaction->save();

       return back()->with('success','Payment is Successful, Thank you');

  }
}
