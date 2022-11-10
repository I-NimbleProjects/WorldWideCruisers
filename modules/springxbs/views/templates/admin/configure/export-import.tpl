{*
 * 2019-2021 Xmlshop LLC
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author Xmlshop LLC <tsuren@xmlshop.com>
 * @copyright  2019-2021 PostNL
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @version  1.4.4
*}
<div class="panel">
    <h3><i class="icon icon-wrench"></i> {$title|escape:'htmlall':'UTF-8'}</h3>
    <br>
    <div class="alert alert-info" role="alert">
        <ol style="{if $pisv15}list-style: decimal;{/if}">
            <li>{l s='Download a list of your products with EXPORT PRODUCTS CSV' mod='springxbs'}</li>
            <li>
                {l s='Open the .csv file and change these three columns' mod='springxbs'}
                <ul style="{if $pisv15}list-style: circle;margin-left: 2em;{/if}">
                    <li>{l s='HS Code' mod='springxbs'}</li>
                    <li>{l s='Country of Origin Code(NL, GB, FR...)' mod='springxbs'}</li>
                    <li>{l s='International Description' mod='springxbs'}</li>
                </ul>
            </li>
            <li>{l s='Save and upload the file' mod='springxbs'}</li>
        </ol>
    </div>
    <div class="clear: both;" style="padding-bottom: 5em;">
        <div class="margin-form" style="margin-bottom: 2em;">
            <form action="{$form_url|escape:'htmlall':'UTF-8'}" target="_blank" method="post">
                <button type="submit" class="btn btn-primary btn-lg">{$btn_msg|escape:'htmlall':'UTF-8'}</button>
            </form>
        </div>
        <div class="margin-form" style="">
            <form action="{$form_url_upload|escape:'htmlall':'UTF-8'}" method="post" enctype="multipart/form-data">
                <div class="">
                    {if $isv15}
                        <input type="file" name="csv_file" accept=".csv">
                        <button type="submit" class="btn btn-primary btn-lg">{$btn_import_msg|escape:'htmlall':'UTF-8'}</button>
                    {else}
                    <div class="" style="float: left; margin-right: 2em;">
                        <label for="Springxbs_csv_file_input" class="p-0" style="padding: 0">
                        <div class=" btn btn-info {if $isv16}btn-lg{/if} pointer" id="page-header-desc-configuration-add_module">
                            <input type="file" style="display: none" name="csv_file" accept=".csv" id="Springxbs_csv_file_input"
                                   onchange="this.files.length ? document.getElementById('Springxbs_file_name_csv').innerHTML = this.files[0].name : '{$btn_file_placeholder|escape:'htmlall':'UTF-8'}'">
                            <div class="" style="display: inline-block;"><i class="material-icons">cloud_upload</i></div><div class="" id="Springxbs_file_name_csv" style="display: inline-block;position: relative;{if !$isv16}bottom: 5px;{/if}padding-left: 5px;">{$btn_file_placeholder|escape:'htmlall':'UTF-8'}</div>
                        </div>
                        </label>
                    </div>
                    <div class="" style="float: left;">
                        <button type="submit" class="btn btn-primary btn-lg">{$btn_import_msg|escape:'htmlall':'UTF-8'}</button>
                    </div>
                    {/if}
                </div>
            </form>
        </div>
    </div>
</div>

