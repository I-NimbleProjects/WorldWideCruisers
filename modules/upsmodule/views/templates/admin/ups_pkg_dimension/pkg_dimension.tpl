{**
 * @author    United Parcel Service of America, Inc.*
 * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
 * @license   This work is Licensed under the Academic Free License version 3.0http://opensource.org/licenses/afl-3.0.php*
 * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page*
 *}
 {assign var="itemCount" value=4 scope="global"}
 <div class="error-message"></div>
 <div class="row">
     <div class="col-lg-12">
         <div class="defaultForm form-horizontal">
             <div class="panel card">
                 <div class="panel-heading">
                     <i class="icon-tag"></i> {$content.txtPkgDefault|escape:'htmlall':'UTF-8'}
                 </div>
                 <div class="card-body form-wrapper">
                     <div class="form-group">
                         <p>{$content.txtPkgWeightSize|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</p>
                         <form action="index.php?controller=AdminUpsPkgDimension&token={getAdminToken tab='AdminUpsPkgDimension'}" method="POST" name="addForm" id="add-package-dimension">
                             <div class="col-sm-12 form-group">
                                 <div class="row default-package-option">
                                     <label class="control-label">
                                         <input type="radio" name="package_setting_option" id="default_package_radio" value="1"{if $package_setting_option == 1} checked{/if}>{$content.txtPkgDefaultOption|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}
                                     </label>
                                     <p class="note-padding-left show-hide">{$content.txtPkgDefaultOptionNote1|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</p>
                                     <p class="note-padding-left note-color show-hide"><i>{$content.txtPkgDefaultOptionNote2|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</i></p>
                                     <br>
                                     <div class="show-hide">
                                         <div class="col-sm-1 col-no-padding"></div>
                                         <div class="col-sm-11 col-no-padding">
                                             <div id="default_package">
                                                 {$rowIndex = 1}
                                                 {foreach $list_default_package as $default_package}
                                                     <div class="row input-row" id="default_package_{$rowIndex|escape:'htmlall':'UTF-8'}">
                                                         <div class="col-sm-8 col-no-padding">
                                                             <div class="col-sm-4">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgNumberOfItem|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][number_of_item]" value="{$default_package.number_of_item|escape:'htmlall':'UTF-8'}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgLength|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][length]" value="{$default_package.length|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgWidth|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][width]" value="{$default_package.width|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgHeight|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][height]" value="{$default_package.height|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <select name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][unit_dimension]" class="form-control">
                                                                     {foreach $list_unit_dimension as $symbol => $name}
                                                                         <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $default_package.unit_dimension == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                                     {/foreach}
                                                                 </select>
                                                             </div>
                                                         </div>
                                                         <div class="col-sm-4 col-no-padding">
                                                             <div class="col-sm-5">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgWeight|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][weight]" value="{$default_package.weight|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-3">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <select name="default_package[{$rowIndex|escape:'htmlall':'UTF-8'}][unit_weight]" class="form-control">
                                                                     {foreach $list_unit_weight as $symbol => $name}
                                                                         <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $default_package.unit_weight == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                                     {/foreach}
                                                                 </select>
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <div class="btn-minus{if $rowIndex == 1} hidden{/if}">
                                                                     <i class="icon-minus-sign text-danger"></i>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     {$rowIndex = $rowIndex + 1}
                                                 {/foreach}
                                             </div>
                                             <a type="button" class="add-row" id="add_row_default_package">
                                                 <i class="icon-plus-sign"></i>{$content.txtPkgAddNewPackage|escape:'htmlall':'UTF-8'}
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row product-dimension-option">
                                     <label class="control-label">
                                         <input type="radio" name="package_setting_option" id="product_dimension_radio" value="2"{if $package_setting_option == 2} checked{/if}>{$content.txtPkgProductOption|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}
                                     </label><br/>
                                     {* <p class="note-padding-left note-color show-hide"><i>{$content.txtPkgProductOptionNote|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</i></p> *}
                                     <br/>
                                     
                                     <div class="row show-hide">
                                         <label class="col-sm-3 control-label">{$content.txtCurrency|escape:'htmlall':'UTF-8'}</label>
                                         <div class="col-sm-2">
                                             <input type="text" disabled="" class="form-control" value="{$content.selectedCurrency|escape:'htmlall':'UTF-8'}">
                                         </div>
                                     </div>
                                     {* <div class="show-hide">
                                         <label class="col-sm-3 control-label">{$content.txtPkgIncludeDimension|escape:'htmlall':'UTF-8'}</label>
                                         <div class="col-sm-7">
                                         <span class="switch prestashop-switch fixed-width-lg">
                                             <input type="radio" name="include_dimension" id="include_dimension_on" value="1"{if $include_dimension == 1} checked{/if}>
                                             <label for="include_dimension_on">{$content.txtYes|escape:'htmlall':'UTF-8'}</label>
                                             <input type="radio" name="include_dimension" id="include_dimension_off" value="0"{if $include_dimension == 0} checked{/if}>
                                             <label for="include_dimension_off">{$content.txtNo|escape:'htmlall':'UTF-8'}</label>
                                             <a class="slide-button btn"></a>
                                         </span>
                                             <p class="note-padding-top note-color"><i>{$content.txtPkgIncludeDimensionNote|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</i></p>
                                         </div>
                                     </div> *}
 
                                     <div class="row show-hide">
                                         <label class="col-sm-3 control-label">{$content.txtPkgIncludeDimension|escape:'htmlall':'UTF-8'}</label>
                                             <div class="col-sm-7">
                                                 <select class="col-sm-5" name="pack_algorithm" id="pack_algorithm">
                                                     <option value ="1" {if $selected_pac_algo == 1 } selected=true {/if}>{$content.txtPackitem|escape:'htmlall':'UTF-8'}</option>
                                                     <option value ="2" {if $selected_pac_algo == 2 } selected=true {/if}>{$content.txtWeightBased|escape:'htmlall':'UTF-8'}</option>
                                                     <option value ="3" {if $selected_pac_algo == 3 } selected=true {/if}>{$content.txtBoxBased|escape:'htmlall':'UTF-8'}</option>
                                                 </select>
                                             </div>
                                    </div>
                                
                                     <!--- pack item indiviaully algorithm -->
                                 <div id="form_packitem" {if $selected_pac_algo !=1 } style="display:none" {/if}>
                                    <div class="row show-hide">
                                        {* <div class="form-group"> *}
                                            <label class="control-label col-lg-3">
                                                <span href="" data-toggle="tooltip" class="" title="{$content.txtPkgDimUnit|escape:'htmlall':'UTF-8'}" data-placement="top" data-html="true">{$content.txtPkgDimUnit|escape:'htmlall':'UTF-8'}:<sup class="star" style='color:red'>*</sup></span>
                                            </label>
                                            <div class="col-lg-2">
                                                <select name="dim_unit" id="dim_unit" class="form-control">
                                                    {foreach $list_unit_dimension as $symbol => $name}
                                                    <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $pack_dim_unit == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                         {* <div class="clearfix"></div> *}
                                        {* </div> *}
                                    </div>
                                   
                                 </div>
 
                                <div id="form_pack_weight_based" {if ($selected_pac_algo !=1) || ($selected_pac_algo !=2) } style="display:none" {/if}>
                                    <div class="row show-hide">
                                        <label class="control-label col-lg-3">
                                            <span href="" data-toggle="tooltip" class="" title="{$content.txtPkgWeightUnit|escape:'htmlall':'UTF-8'}" data-placement="top" data-html="true">{$content.txtPkgWeightUnit|escape:'htmlall':'UTF-8'}:<sup class="star" style='color:red'>*</sup></span>
                                        </label>
                                        <div class="col-lg-2">
                                            <select name="weig_unit" id="weig_unit" class="form-control">
                                                {foreach $list_unit_weight as $symbol => $name}
                                                    <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $pack_weg_unit == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                 {* <div class="clearfix"></div> *}
                                    </div>
                                </div>

                           <!-- Weight based packing -->
                                <div id ="form_weight_based" {if $selected_pac_algo !=2} style="display:none" {/if}>
                                    <div class="row show-hide">
                                        {* <div class="form-group"> *}
                                            <label class="control-label col-lg-3">
                                                <span href="" data-toggle="tooltip" class="" title="{$content.txtPkgMaxWeight1|escape:'htmlall':'UTF-8'}" data-placement="top" data-html="true">{$content.txtPkgMaxWeight1|escape:'htmlall':'UTF-8'}:<sup class="star" style='color:red'>*</sup></span>
                                            </label>
                                            <div class="col-lg-2">
                                                <input maxlength="7" inputrate="" class="form-control" type="text" id="max_weight" name="max_weight"  df="0" hdflat="" value="{$pack_max_weight}">
                                            </div>
                                     {* <div class="clearfix"></div> *}
                                        {* </div> *}
                                    </div>
                                </div>
 
                       <!-- Box Packing-->
                                 <div id ="form_box_packing" {if $selected_pac_algo !=3} style="display:none" {/if}>
                                     <div class="row show-hide">
                                         <label class="col-sm-3 control-label">{$content.txtPkgBoxDimension|escape:'htmlall':'UTF-8'}</label>
                                     </div>
                                     <div class="row show-hide">
                                         <div class="col-sm-2"></div>
                                         <div class="col-sm-10">
                                             <div id="product_dimension">
                                                 {$rowIndex = 1}
                                                 {foreach $list_product_dimension as $product_dimension}
                                                     <div class="row input-row" id="product_dimension_{$rowIndex|escape:'htmlall':'UTF-8'}">
                                                         <div class="col-sm-8 col-no-padding">
                                                             <div class="col-sm-4">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgName|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][package_name]" value="{$product_dimension.package_name|escape:'htmlall':'UTF-8'}" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgLength|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][length]" value="{$product_dimension.length|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgWidth|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][width]" value="{$product_dimension.width|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgHeight|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][height]" value="{$product_dimension.height|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <select name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][unit_dimension]" class="form-control">
                                                                     {foreach $list_unit_dimension as $symbol => $name}
                                                                         <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $product_dimension.unit_dimension == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                                     {/foreach}
                                                                 </select>
                                                             </div>
                                                         </div>
                                                         <div class="col-sm-4 col-no-padding">
                                                             <div class="col-sm-5">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgMaxWeight|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][weight]" value="{$product_dimension.weight|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-4">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <select name="product_dimension[{$rowIndex|escape:'htmlall':'UTF-8'}][unit_weight]" class="form-control">
                                                                     {foreach $list_unit_weight as $symbol => $name}
                                                                         <option value="{$symbol|escape:'htmlall':'UTF-8'}"{if $product_dimension.unit_weight == $symbol} selected{/if}>{$name|escape:'htmlall':'UTF-8'}</option>
                                                                     {/foreach}
                                                                 </select>
                                                             </div>
                                                             <div class="col-sm-2">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <div class="btn-minus{if $rowIndex == 1} hidden{/if}">
                                                                     <i class="icon-minus-sign text-danger"></i>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     {$rowIndex = $rowIndex + 1}
                                                 {/foreach}
                                             </div>
                                             <a type="button" class="add-row" id="add_row_product_dimension">
                                                 <i class="icon-plus-sign"></i>{$content.txtPkgAddNewPackage|escape:'htmlall':'UTF-8'}
                                             </a>
                                             {* <p class="note-padding-top note-color"><i>{$content.txtPkgAddBoxDimension|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</i></p> *}
                                         </div>
                                     </div>
                                 </div>
                                     {if $is_address_delivery == 1}
                                         <div class="row show-hide">
                                             <label class="col-sm-3 control-label">{$content.txtPkgBackupRate|escape:'htmlall':'UTF-8'}</label>
                                             <div class="col-sm-8">
                                                 <div id="backup_rate">
                                                     {$rowIndex = 1}
                                                     {foreach $list_backup_rate as $backup_rate}
                                                         <div class="row input-row" id="backup_rate_{$rowIndex|escape:'htmlall':'UTF-8'}">
                                                             <div class="col-sm-6">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgServiceName|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <select name="backup_rate[{$rowIndex|escape:'htmlall':'UTF-8'}][service_key]" class="form-control">
                                                                     {foreach $list_service as $service}
                                                                         <option value="{$service.key|escape:'htmlall':'UTF-8'}"{if $backup_rate.service_key == $service.key} selected{/if}>{$service.name|escape:'htmlall':'UTF-8'}</option>
                                                                     {/foreach}
                                                                 </select>
                                                             </div>
                                                             <div class="col-sm-3">
                                                                 {if $rowIndex == 1}
                                                                     <p class="text-center"><small>{$content.txtPkgRate|escape:'htmlall':'UTF-8'}</small></p>
                                                                 {/if}
                                                                 <input maxlength="7" inputrate="" class="form-control" type="text" name="backup_rate[{$rowIndex|escape:'htmlall':'UTF-8'}][rate]" value="{$backup_rate.rate|escape:'htmlall':'UTF-8'|string_format:"%.2f"}" df="0" hdflat="">
                                                             </div>
                                                             <div class="col-sm-3">
                                                                 {if $rowIndex == 1}
                                                                     <p><br></p>
                                                                 {/if}
                                                                 <div class="btn-minus{if $rowIndex == 1} hidden{/if}">
                                                                     <i class="icon-minus-sign text-danger"></i>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         {$rowIndex = $rowIndex + 1}
                                                     {/foreach}
                                                 </div>
                                                 <a class="add-row" id="add_row_backup_rate">
                                                     <i class="icon-plus-sign"></i>{$content.txtPkgAddBackupRate|escape:'htmlall':'UTF-8'}
                                                 </a>
                                                 <p class="note-padding-top note-color"><i>{$content.txtPkgBackupRateNote|escape:'htmlall':'UTF-8'|htmlspecialchars_decode:3}</i></p>
                                             </div>
                                         </div>
                                     {/if}
                                 </div>
                             </div>
                             <input type="hidden" name="btn_package"/>
                         </form>
                     </div>
                     <div class="panel-footer text-right">
                         <span id="btn_package_save" class="btn btn-default pull-left"><i class="process-icon-save"></i>{$content.txtSave|escape:'htmlall':'UTF-8'}</span>
                         <span id="btn_package_next" class="btn btn-default pull-right"><i class="process-icon-next"></i>{$content.txtNext|escape:'htmlall':'UTF-8'}</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="modal fade" id="popup-warning" style="z-index: 1051 !important" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="ups-modal-alert-title">{$content.ttlWarning|escape:'htmlall':'UTF-8'}</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body" id="popup-text-warning">
             </div>
             <div class="modal-footer">
                 <button type="button" class="button button-secondary btn-cancel" data-dismiss="modal">{$content.btnCancel|escape:'htmlall':'UTF-8'}</button>
                 <button type="button" class="button button-primary" id="btn_confirm_ok" data-dismiss="modal">{$content.txtArcOk|escape:'htmlall':'UTF-8'}</button>
             </div>
         </div>
     </div>
 </div>
 
 
 