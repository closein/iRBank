<!--
callback.php
Hamed masrour
sepehrpay.com
-->

<?php

require_once("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("utility.php");
    require_once("require.php");

    ?>

<div class="container">
    <div class="row rtl-direction" style="justify-content: center;">
        <div class="col-12 col-lg-6 fit-width p-0 mt-4 d-flex flex-column text-justify" style="box-shadow: 0 6px 15px rgba(0, 0, 0, 0.26)">

        <div class="pl-3 pr-3 pb-1 text-justify" style="color:#fff; background:#ada9ac; border-radius:5px 5px 0 0; margin-top:-3px; padding:9px; "> 
        نتیجه
        </div>
            <div class="" style="border:1px solid #ada9ac; font-size:12px; border-radius:0 0 5px 5px; padding:10px">
                <div class="row m-0">
                    <div class=" p-0">
                        <div class="pl-3 pr-3 pb-1">
<?php
    if( isset($_POST['respcode']) && isset($_POST['invoiceid']) ){

    //// دریافت اطلاعات برگشتی از صفحه پرداخت

    ////////////////////////////////
	// کد پاسخ وضعیت
    $respcode = test_input($_POST['respcode']);
	// متن پاسخ وضعیت
    $respmsg = test_input($_POST['respmsg']);
	// مبلغ شارژ
    $amount = test_input($_POST['amount']);
	// شماره سفارش فروشگاه
    $invoiceid_ipg = test_input($_POST['invoiceid']);  
	// اطلاعات اضافی
    $payload = test_input($_POST['payload']);
	// شماره ترمینال
    $terminalid = test_input($_POST['terminalid']);

    ////////////////////////////////
	// شماره پیگیری
    $tracenumber = test_input($_POST['tracenumber']);	
	// شماره سند بانکی
    $rrn = $_POST['rrn'];
	// زمان و تاریخ تراکنش
    $datePaid = test_input($_POST['datepaid']);
    // رسید دیجیتال
    $digitalreceipt = test_input($_POST['digitalreceipt']);
	// بانک صادرکننده کارت
    $issuerbank = test_input($_POST['issuerbank']);
	// شماره کارت
    $cardnumber = test_input($_POST['cardnumber']);


    if( $respcode == 0 ){

        $AdviceAddress="https://mabna.shaparak.ir:8081/V1/PeymentApi/Advice";

        $dataQuery ='digitalreceipt='.$digitalreceipt.'&Tid='.$terminalid;

      $AdviceArray = makeHttpChargeRequest('POST',$dataQuery,$AdviceAddress);
      $decode_AdviceArray=json_decode($AdviceArray);

      //var_dump($decode_TokenArray);

      $Status =$decode_AdviceArray->Status;
      $ReturnId=$decode_AdviceArray->ReturnId;
      $Message=$decode_AdviceArray->Message;


    }

            echo '<div class="pl-3 pr-3 pb-3">';

                    echo $respmsg;

            echo '</div>'; 


        if ( $respcode == 0 && $Status== "Ok" && $ReturnId==$amount){

            echo '<div class="pl-3 pr-3 pb-3">';

                    echo " شماره پیگیری : ";
                    echo $rrn;

             echo '</div>'; 

             }

        } else { // if( isset($_POST['respcode']) && isset($_POST['invoiceid']) )
        
            $error_message = test_input($_POST['error_message']);

            echo '<div class="pl-3 pr-3 pb-3">';

            echo $error_message;

            echo '</div>';
        }

    ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php

} // if ($_SERVER["REQUEST_METHOD"] == "POST")

?>
