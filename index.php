<!--
Plugin Name: PHP IPG Sample 
Author: hamed masrour
URI: http://sepehrpay.com
Version: 1.0.0
Description: IPG Sample Code
Licence: GPLv2 or later
-->

<?php

require_once("header.php");
require_once("utility.php");
require_once("require.php");

?>

<div class="container">
    <div class="row rtl-direction" style="justify-content: center;">
        <div class="col-12 col-lg-6 fit-width p-0 mt-4 d-flex flex-column text-justify" style="box-shadow: 0 6px 15px rgba(0, 0, 0, 0.26)">

            <div class="p-3 text-align-center" style="color:#fff; background:#ada9ac; border-radius:5px 5px 0 0; margin-top:-3px; padding:9px; "> 
        تست IPG همراه توکن
        </div>
            <div class="p-3" style="border:1px solid #ada9ac; font-size:14px; border-radius:0 0 5px 5px; padding:10px">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <!-- <div class="pl-3 pr-3 pb-3">
                            کاربر محترم لطفا اطلاعات خود را وارد نمایید
                        </div> -->

                        <form action="get_token.php" method="POST" class="ajax-form-get-token">

                            <input name="Amount" type="text" placeholder=" مبلغ ( ریال ) " id="Amount" required="required" oninvalid="this.setCustomValidity('این فیلد نباید خالی باشد')" 
                            oninput="setCustomValidity('')" maxlength="10" class="form-control mt-3" >

                            <input name="terminalID" type="text" placeholder=" شماره ترمینال " pattern="^([0-9]{8})$" id="terminalID" required="required" oninvalid="this.setCustomValidity('این فیلد نباید خالی باشد')" 
                            oninput="setCustomValidity('')" maxlength="8" class="form-control mt-3" >

                            <input name="invoiceID" type="text" placeholder=" شماره سفارش ( سایت ) "  id="invoiceID" required="required" oninvalid="this.setCustomValidity('این فیلد نباید خالی باشد')" 
                            oninput="setCustomValidity('')" maxlength="10" class="form-control mt-3" >

                            <input name="payload" type="text" placeholder=" داده اضافی " id="payload" oninvalid="this.setCustomValidity('این فیلد نباید خالی باشد')" 
                            oninput="setCustomValidity('')"  class="form-control mt-3" >

                            <br>
                            <label class="mb-0 " for="callbackURL"> صفحه برگشت : </label>
                            <input name="callbackURL" type="text" placeholder="صفحه برگشت" id="callbackURL" required="required" oninvalid="this.setCustomValidity('این فیلد نباید خالی باشد')" 
                            oninput="setCustomValidity('')"  class="form-control mt-3" value=<?php echo ROOT_DIR_URL."callback.php"; ?>>

                            <input type="submit" name="send" value="ارسال" class="btn btn-success mt-3" />
                            
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- <script type="text/javascript">

    jQuery(document).ready(function(){

    jQuery(".ajax-form-get-token").on("submit", function () {

        var form = jQuery(this),
                action = form.attr('action'),
                method = form.attr('method'),
                dataSerialize = form.serialize();

        var request = jQuery.ajax({
            type: method,
            url: action,
            data: dataSerialize
        });

        request.done(function (data) {
			
        });

        request.fail(function () {
            alert('ارسال اطلاعات با مشکل رو به رو شده است');
        });

        return false;
    });
	
});	

</script> -->