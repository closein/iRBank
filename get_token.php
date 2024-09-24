<!--
get_token.php
Hamed masrour
sepehrpay.com
-->

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if($_POST['Amount']!== null && $_POST['callbackURL']!== null && $_POST['invoiceID']!== null && $_POST['terminalID']!== null ){

require_once("utility.php");

// $data= array(
//     'Amount'=>test_input($_POST['Amount']),
//     'callbackURL'=>test_input($_POST['callbackURL']),
//     'invoiceID'=>test_input($_POST['invoiceID']),
//     'terminalID'=>test_input($_POST['terminalID']),
//     'payload'=>test_input($_POST['payload'])
// );   

// $dataQuery=http_build_query($data);           

    //Get Token
    $dataQuery ='Amount='.test_input($_POST['Amount']).'&callbackURL='.test_input($_POST['callbackURL']).'&InvoiceID='.test_input($_POST['invoiceID']).'&TerminalID='.test_input($_POST['terminalID']).'&Payload='.test_input($_POST['payload']);
    $AddressServiceToken="https://mabna.shaparak.ir:8081/V1/PeymentApi/GetToken";

     $TokenArray = makeHttpChargeRequest('POST',$dataQuery,$AddressServiceToken);
     $decode_TokenArray=json_decode($TokenArray);

      //var_dump($decode_TokenArray);

      $Status =$decode_TokenArray->Status;
      $AccessToken=$decode_TokenArray->Accesstoken;


      if(!empty($AccessToken) && $Status == 0){
        $AddressIpgPay="https://mabna.shaparak.ir:8080/pay";

?>



      <?php
sleep(10);
      ?>

                        <form action="<?php echo $AddressIpgPay; ?>" method="POST" id="ipg">
                            <input name="TerminalID" type="hidden" required="required" value="<?php echo test_input($_POST['terminalID']); ?>" >

                            <input name="token" type="hidden" required="required" value="<?php echo $AccessToken; ?>">
                           
                            <!-- <input type="submit"/> -->
                            
                        </form>

                        <script type="text/javascript">
                            document.getElementById('ipg').submit(); // SUBMIT FORM
                        </script>
<?php
      }else{

        $error_message = "  دریافت توکن با خطا مواجه شد !!! "
        ?>

                        <form action="<?php echo test_input($_POST['callbackURL']); ?>" method="POST" id="error_token">
                                 <input name="error_message" type="hidden" required="required" value="<?php echo $error_message; ?>" >                                                        
                        </form>

                        <script type="text/javascript">
                            document.getElementById('error_token').submit(); // SUBMIT FORM
                        </script>
<?php

      }

    }
}