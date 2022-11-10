/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

$(document).ready(function() {
    $('<div id= "ap_check_err" style="display:none;">No text found</div>').insertBefore('.form-wrapper');
    var temp_loader_img = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHdpZHRoPSI0MHB4IiBoZWlnaHQ9IjQwcHgiIHZpZXdCb3g9IjAgMCA0MCA0MCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7IiB4PSIwcHgiIHk9IjBweCI+CiAgICA8ZGVmcz4KICAgICAgICA8c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWwogICAgICAgICAgICBALXdlYmtpdC1rZXlmcmFtZXMgc3BpbiB7CiAgICAgICAgICAgICAgZnJvbSB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIC13ZWJraXQtdHJhbnNmb3JtOiByb3RhdGUoLTM1OWRlZykKICAgICAgICAgICAgICB9CiAgICAgICAgICAgIH0KICAgICAgICAgICAgQGtleWZyYW1lcyBzcGluIHsKICAgICAgICAgICAgICBmcm9tIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNTlkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICB9CiAgICAgICAgICAgIHN2ZyB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybS1vcmlnaW46IDUwJSA1MCU7CiAgICAgICAgICAgICAgICAtd2Via2l0LWFuaW1hdGlvbjogc3BpbiAxLjVzIGxpbmVhciBpbmZpbml0ZTsKICAgICAgICAgICAgICAgIC13ZWJraXQtYmFja2ZhY2UtdmlzaWJpbGl0eTogaGlkZGVuOwogICAgICAgICAgICAgICAgYW5pbWF0aW9uOiBzcGluIDEuNXMgbGluZWFyIGluZmluaXRlOwogICAgICAgICAgICB9CiAgICAgICAgXV0+PC9zdHlsZT4KICAgIDwvZGVmcz4KICAgIDxnIGlkPSJvdXRlciI+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwwQzIyLjIwNTgsMCAyMy45OTM5LDEuNzg4MTMgMjMuOTkzOSwzLjk5MzlDMjMuOTkzOSw2LjE5OTY4IDIyLjIwNTgsNy45ODc4MSAyMCw3Ljk4NzgxQzE3Ljc5NDIsNy45ODc4MSAxNi4wMDYxLDYuMTk5NjggMTYuMDA2MSwzLjk5MzlDMTYuMDA2MSwxLjc4ODEzIDE3Ljc5NDIsMCAyMCwwWiIgc3R5bGU9ImZpbGw6YmxhY2s7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNNS44NTc4Niw1Ljg1Nzg2QzcuNDE3NTgsNC4yOTgxNSA5Ljk0NjM4LDQuMjk4MTUgMTEuNTA2MSw1Ljg1Nzg2QzEzLjA2NTgsNy40MTc1OCAxMy4wNjU4LDkuOTQ2MzggMTEuNTA2MSwxMS41MDYxQzkuOTQ2MzgsMTMuMDY1OCA3LjQxNzU4LDEzLjA2NTggNS44NTc4NiwxMS41MDYxQzQuMjk4MTUsOS45NDYzOCA0LjI5ODE1LDcuNDE3NTggNS44NTc4Niw1Ljg1Nzg2WiIgc3R5bGU9ImZpbGw6cmdiKDIxMCwyMTAsMjEwKTsiLz4KICAgICAgICA8L2c+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwzMi4wMTIyQzIyLjIwNTgsMzIuMDEyMiAyMy45OTM5LDMzLjgwMDMgMjMuOTkzOSwzNi4wMDYxQzIzLjk5MzksMzguMjExOSAyMi4yMDU4LDQwIDIwLDQwQzE3Ljc5NDIsNDAgMTYuMDA2MSwzOC4yMTE5IDE2LjAwNjEsMzYuMDA2MUMxNi4wMDYxLDMzLjgwMDMgMTcuNzk0MiwzMi4wMTIyIDIwLDMyLjAxMjJaIiBzdHlsZT0iZmlsbDpyZ2IoMTMwLDEzMCwxMzApOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksMjguNDkzOUMzMC4wNTM2LDI2LjkzNDIgMzIuNTgyNCwyNi45MzQyIDM0LjE0MjEsMjguNDkzOUMzNS43MDE5LDMwLjA1MzYgMzUuNzAxOSwzMi41ODI0IDM0LjE0MjEsMzQuMTQyMUMzMi41ODI0LDM1LjcwMTkgMzAuMDUzNiwzNS43MDE5IDI4LjQ5MzksMzQuMTQyMUMyNi45MzQyLDMyLjU4MjQgMjYuOTM0MiwzMC4wNTM2IDI4LjQ5MzksMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxMDEsMTAxLDEwMSk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMy45OTM5LDE2LjAwNjFDNi4xOTk2OCwxNi4wMDYxIDcuOTg3ODEsMTcuNzk0MiA3Ljk4NzgxLDIwQzcuOTg3ODEsMjIuMjA1OCA2LjE5OTY4LDIzLjk5MzkgMy45OTM5LDIzLjk5MzlDMS43ODgxMywyMy45OTM5IDAsMjIuMjA1OCAwLDIwQzAsMTcuNzk0MiAxLjc4ODEzLDE2LjAwNjEgMy45OTM5LDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoMTg3LDE4NywxODcpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTUuODU3ODYsMjguNDkzOUM3LjQxNzU4LDI2LjkzNDIgOS45NDYzOCwyNi45MzQyIDExLjUwNjEsMjguNDkzOUMxMy4wNjU4LDMwLjA1MzYgMTMuMDY1OCwzMi41ODI0IDExLjUwNjEsMzQuMTQyMUM5Ljk0NjM4LDM1LjcwMTkgNy40MTc1OCwzNS43MDE5IDUuODU3ODYsMzQuMTQyMUM0LjI5ODE1LDMyLjU4MjQgNC4yOTgxNSwzMC4wNTM2IDUuODU3ODYsMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxNjQsMTY0LDE2NCk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMzYuMDA2MSwxNi4wMDYxQzM4LjIxMTksMTYuMDA2MSA0MCwxNy43OTQyIDQwLDIwQzQwLDIyLjIwNTggMzguMjExOSwyMy45OTM5IDM2LjAwNjEsMjMuOTkzOUMzMy44MDAzLDIzLjk5MzkgMzIuMDEyMiwyMi4yMDU4IDMyLjAxMjIsMjBDMzIuMDEyMiwxNy43OTQyIDMzLjgwMDMsMTYuMDA2MSAzNi4wMDYxLDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoNzQsNzQsNzQpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksNS44NTc4NkMzMC4wNTM2LDQuMjk4MTUgMzIuNTgyNCw0LjI5ODE1IDM0LjE0MjEsNS44NTc4NkMzNS43MDE5LDcuNDE3NTggMzUuNzAxOSw5Ljk0NjM4IDM0LjE0MjEsMTEuNTA2MUMzMi41ODI0LDEzLjA2NTggMzAuMDUzNiwxMy4wNjU4IDI4LjQ5MzksMTEuNTA2MUMyNi45MzQyLDkuOTQ2MzggMjYuOTM0Miw3LjQxNzU4IDI4LjQ5MzksNS44NTc4NloiIHN0eWxlPSJmaWxsOnJnYig1MCw1MCw1MCk7Ii8+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4K";
    $('<div id="service_loader" style="display: none; position: fixed; width: 100%; z-index: 9999999; background-color: #000; opacity: .5; top: 0; right: 0; bottom: 0; left: 0;"><img src="'+temp_loader_img+'" alt="loading...." style="position: absolute;left: 50%;top: 50%;"></div>').insertBefore('.form-wrapper');

    $(window).load(function () {
        document.getElementsByClassName("form-group")[2].setAttribute("id", "defaultOptior");
        document.getElementsByClassName("form-group")[3].setAttribute("id", "apaddrasshiptoaddr");
        document.getElementsByClassName("form-group")[4].setAttribute("id", "selectShippingToApDelivery");
        document.getElementsByClassName("form-group")[5].setAttribute("id", "displaySetting");
        document.getElementsByClassName("form-group")[6].setAttribute("id", "ChooseAultSigntures");
        document.getElementsByClassName("form-group")[7].setAttribute("id", "numOfAccess");
        document.getElementsByClassName("form-group")[8].setAttribute("id", "ApsInRange");
        document.getElementsByClassName("form-group")[9].setAttribute("id", "ChooseAccToApDelivery");
        document.getElementsByClassName("form-group")[12].setAttribute("id", "selectShippingToAddDelivery");
        document.getElementsByClassName("form-group")[13].setAttribute("id", "ChooseAccToAddDelivery");
        if (document.getElementById("UPS_SP_SERV_AP_DELIVERY_on").checked == true)
        { 
            document.getElementById("displaySetting").hidden = "";
            document.getElementById("numOfAccess").hidden = "";
            document.getElementById("defaultOptior").hidden = "";
            document.getElementById("apaddrasshiptoaddr").hidden = "";
            document.getElementById("selectShippingToApDelivery").hidden = "";
            document.getElementById("ApsInRange").hidden = "";
            document.getElementById("ChooseAccToApDelivery").hidden = "";
			document.getElementById("ChooseAultSigntures").hidden = "";
        }

        else{ 
            document.getElementById("defaultOptior").hidden = "hidden";
            document.getElementById("apaddrasshiptoaddr").hidden = "hidden";
            document.getElementById("selectShippingToApDelivery").hidden = "hidden";
            document.getElementById("displaySetting").hidden = "hidden";
            document.getElementById("numOfAccess").hidden = "hidden";
            document.getElementById("ApsInRange").hidden = "hidden";
            document.getElementById("ChooseAccToApDelivery").hidden = "hidden";
            document.getElementById("UPS_SP_SERV_AP_CHOOSE_ACC").hidden = "hidden";
        }

        if (document.getElementById("UPS_SP_SERV_ADDRESS_DELIVERY_on").checked == true)
        {
            document.getElementById("selectShippingToAddDelivery").hidden = "";
            document.getElementById("ChooseAccToAddDelivery").hidden = "";
        }

        else{
            document.getElementById("selectShippingToAddDelivery").hidden = "hidden";
            document.getElementById("ChooseAccToAddDelivery").hidden = "hidden";
        }
    });

    $("#UPS_SP_SERV_AP_DELIVERY_off").click(function () { 
        $("#ap_check_err").hide();
        document.getElementById("defaultOptior").hidden = "hidden";
        document.getElementById("apaddrasshiptoaddr").hidden = "hidden";
        document.getElementById("selectShippingToApDelivery").hidden = "hidden";
        document.getElementById("displaySetting").hidden = "hidden";
        document.getElementById("numOfAccess").hidden = "hidden";
        document.getElementById("ApsInRange").hidden = "hidden";
        document.getElementById("ChooseAccToApDelivery").hidden = "hidden";
        document.getElementById("UPS_SP_SERV_AP_CHOOSE_ACC").hidden = "hidden";
        document.getElementById("ChooseAultSigntures").hidden = "hidden";
        document.getElementById("UPS_SP_SERV_AP_DELIVERY_on") = "UPS_SP_SERV_AP_DELIVERY_off";
        return false;
    });
    $("#UPS_SP_SERV_AP_DELIVERY_on").click(function () {
        $("#ap_check_err").hide();
        $("#service_loader").show();
        $.ajax({
                    showLoader: true,
                    type: 'POST',
                    url: 'index.php?controller=AdminUpsRateonorder',
                    data: {
                        token: token,
                        ajax: true,
                        action: 'AP_Check'
                        
                    },
                    dataType: 'json',
                    success: function(data) { 
                        $("#service_loader").hide();
                      if (data.status == "success"){
                        var ap_check_html = '<p style="color:green;background-color:#91f091;text-align: center;border-radius: 5px;width:200px">AP service enabled.</p>';
                        $("#ap_check_err").html(ap_check_html);
                        $("#ap_check_err").show();
                        document.getElementById("displaySetting").hidden = "";
                        document.getElementById("numOfAccess").hidden = "";
                        document.getElementById("defaultOptior").hidden = "";
                        document.getElementById("apaddrasshiptoaddr").hidden = "";
                        document.getElementById("selectShippingToApDelivery").hidden = "";
                        document.getElementById("ApsInRange").hidden = "";
                        document.getElementById("ChooseAccToApDelivery").hidden = "";
                        document.getElementById("ChooseAultSigntures").hidden = "";
                        document.getElementById("UPS_SP_SERV_AP_DELIVERY_off")= "UPS_SP_SERV_AP_DELIVERY_on";
                        
                    } else if (data.status != "success"){
                        var ap_check_html = '<p style="color:red;background-color: #fde1c0;text-align: center;border-radius: 5px;">Failed to enable AP service. '+data.status+' Contact support.</p>';
                        $("#ap_check_err").html(ap_check_html);
                        $("#ap_check_err").show();
                        $("#UPS_SP_SERV_AP_DELIVERY_on").prop("checked", false);
                        $("#UPS_SP_SERV_AP_DELIVERY_off").prop("checked", true);
                    } else {
                        var ap_check_html = '<p style="color:red;background-color: #fde1c0;text-align: center;border-radius: 5px;">Failed to enable AP service. Contact support.</p>';
                        $("#ap_check_err").html(ap_check_html);
                        $("#ap_check_err").show();
                        document.getElementById("UPS_SP_SERV_AP_DELIVERY_on") = "UPS_SP_SERV_AP_DELIVERY_off";
                    }
                    },
                    error: function (errorThrown) {
                        $("#service_loader").hide();
                        var ap_check_html = '<p style="color:red;background-color: #fde1c0;text-align: center;border-radius: 5px;">Failed to enable AccessPoint service. Contact support.</p>';
                        $("#ap_check_err").html(ap_check_html);
                        $("#ap_check_err").show();
                        document.getElementById("UPS_SP_SERV_AP_DELIVERY_on") = "UPS_SP_SERV_AP_DELIVERY_off";
                    }
                });
                
    });
    $("#UPS_SP_SERV_ADDRESS_DELIVERY_off").click(function () {
        document.getElementById("selectShippingToAddDelivery").hidden = "hidden";
        document.getElementById("ChooseAccToAddDelivery").hidden = "hidden";
        document.getElementById("UPS_SP_SERV_ADDRESS_DELIVERY_on") = "UPS_SP_SERV_ADDRESS_DELIVERY_off";
        return false;
    });
    $("#UPS_SP_SERV_ADDRESS_DELIVERY_on").click(function () {
        document.getElementById("selectShippingToAddDelivery").hidden = "";
        document.getElementById("ChooseAccToAddDelivery").hidden = "";
        document.getElementById("UPS_SP_SERV_ADDRESS_DELIVERY_off") = "UPS_SP_SERV_ADDRESS_DELIVERY_on";
        return false;
    });

});
