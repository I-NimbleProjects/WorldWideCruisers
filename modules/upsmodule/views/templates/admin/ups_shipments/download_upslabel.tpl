{**
 * @author    United Parcel Service of America, Inc.*
 * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
 * @license   This work is Licensed under the Academic Free License version 3.0http://opensource.org/licenses/afl-3.0.php*
 * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page*
 *}
<br>
    <div class="panel"><br/>
        <h3><i class="icon icon-truck"></i> {l s='Official UPS' mod='upsmodule'}</h3>
        {if empty($all_ups_services)}
            <p style="color:red;">Enable any non-Accesspoint service and continue...</p>
        {else}
            {if $label_available}
                <form method="post">
                <span style="font-weight:bold;">{l s='Choose Label Format' mod='upsmodule'}:</span>
                <select name="ups_label_format" id="ups_label_format" class="chosen-single form-control">
                        <option value= "PDF">PDF</option>
                        <option value="ZPL">ZPL</option>
                </select><br/>
                <button name ="ups_print_label" id="ups_print_label" class="btn" style="border-radius:4px; background-color:#FDD204; color:#370505">Download Label</button>
                {* <button name ="ups_zpl_label" class="btn btn-outline-info mr00" >Download ZPL Label</button> *}
                </form>
            {else}
                <span><button id="order_rate" class="btn" name ="order_rate" style="border-radius:4px; background-color:#FDD204; color:#370505">Generate Rate & Label</button></span>
                <input value="{$order_id}" type="text" id="order_id_ups" hidden>
                <form>
                <div id="rate_on_order"></div>
                <div id="select_upsservice">
                <br/><span style="font-weight:bold;">{l s='Select Service' mod='upsmodule'}:</span>
                <select name="ups_services" id="ups_services" class="chosen-single form-control">
                    {foreach $all_ups_services as $key => $value}
                        <option value="{$key}" > {$value['name']}</option>
                    {/foreach}
                </select></div><br>
                <span><button id="ups_label" class="btn" name ="ups_label" style="border-radius:4px; background-color:#FDD204; color:#370505">Create UPS Label</button></span> 
                </form>
            {/if}
        {/if}
    </div>

<script type="text/javascript" src="{$view_dir|escape:'htmlall':'UTF-8'}/js/rateonorder.js"></script>