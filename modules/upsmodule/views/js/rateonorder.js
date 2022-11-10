/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */


$('#order_rate').on('click', function() {
    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsRateonorder',
        data :
        {
            token: token,
            ajax : true,
            orderID: $("#order_id_ups").val()
        },
        dataType : 'json',
        beforeSend: function() {
            $('#order_rate').prop('disabled',true);
            $('#ups_label').prop('disabled',true);
        },
        complete: function() {
            $('#order_rate').prop('disabled',false);
            $('#ups_label').prop('disabled',false);
        },
        success: function(data) {
            if (data.success) {
                var rates = data.rates_list;
                var rates_html = "";
                for (var i = 0; i <= rates.length - 1; i++) {
                    rates_html += '<br/><input type="radio" id="'+i+'" name="ups_services_radio" value="'+rates[i].rate_code+'-'+rates[i].key+'"><label for="'+i+'" style="margin-left:2px;">'+rates[i].rate_des+' - '+rates[i].rate+' '+rates[i].currency+'</label>';
                }
                $("#rate_on_order").html(rates_html);
                $("#order_rate").hide();
                $("#select_upsservice").hide();
            } else {
                var rates_html = "";
                if (data.error) {
                    rates_html = '<b style="color:red;">'+data.error+'</b>';
                } else {
                    rates_html = '<b style="color:red;">Unknown error occurred while fetching rate.</b>';
                }
                $("#rate_on_order").html(rates_html);
            }
        },
        error: function() {
            var rates_html = '<b style="color:red;">Fetching rates failed.</b>';
          $("#rate_on_order").html(rates_html);
        }
    });
  });


  