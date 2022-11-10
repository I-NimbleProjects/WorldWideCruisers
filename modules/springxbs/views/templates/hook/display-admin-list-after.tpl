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
<style>
    .d-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important
    }

    .justify-content-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important
    }
</style>
<template id="menu_item_springxbs">
    <li id="springxbsBulkConcepts">
        <a href="#"
           onclick="$('#springxbsModalDialog').modal('show'); return false;"
           id="springxbsBulkConceptsLink"
           style="cursor: pointer">
            <img src="/modules/springxbs/logo.png" width="16" height="16">
            {l s='Print Labels Bulk' mod='springxbs'}
        </a>
    </li>
    <li id="springxbsBulkConcepts">
        <a href="#"
           onclick="$('#springxbsRequestLabels').modal('show'); return false;"
           id="springxbsBulkConceptsLink"
           style="cursor: pointer">
            <img src="/modules/springxbs/logo.png" width="16" height="16">
            {l s='Get Labels Bulk' mod='springxbs'}
        </a>
    </li>
</template>

<template id="textModeEl">
    <span class="text-danger"> - {l s='Test Mode'|escape:'htmlall' mod='springxbs'}</span>
</template>

<div class="modal fade" id="springxbsModalDialog" tabindex="-1" role="dialog"
     aria-labelledby="springxbsModalDialogLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header position-relative" style="padding: 10px;">
                <h3 class="modal-title" id="springxbsModalDialogLabel" style="display: inline-block;">
                    <img src="/modules/springxbs/views/img/logo.png" width="30" height="30" alt="Spring GDS">
                    SpringXBS {l s='Print Labels Bulk' mod='springxbs'}
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <div class="d-flex justify-content-around">
                    {foreach $label_formats_list as $format}
                        <div>
                            <a data-href="{$format.link|escape:'htmlall':'UTF-8'}" href="" target="_blank"
                               class="springxbs-bulk-selector springxbs-{$format.name|escape:'htmlall':'UTF-8'}-selector btn btn-sm btn-primary">{$format.name|escape:'htmlall':'UTF-8'}</a>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="springxbsRequestLabels">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="springxbsRequestLabelsLabel" style="display: inline-block;">
                    <img src="/modules/springxbs/views/img/logo.png" width="30" height="30" alt="Spring GDS">
                    SpringXBS {l s='Request Labels Bulk' mod='springxbs'}
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <div class="d-flex justify-content-around">
                    {foreach $label_formats_list as $format}
                        <div>
                            <a data-href="{$format.link|escape:'htmlall':'UTF-8'}" href="" target="_blank"
                               class="springxbs-bulk-selector springxbs-{$format.name|escape:'htmlall':'UTF-8'}-selector btn btn-sm btn-primary">{$format.name|escape:'htmlall':'UTF-8'}</a>
                        </div>
                    {/foreach}
                    <div>
                        <a href="#" data-dismiss="modal" class="btn btn-sm btn-primary">
                            {l s='Close' mod='springxbs'}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hidden {
        display: none !important;
    }

    .springxbs-modal-labels {
        list-style: none;
    }
</style>
<script>
    $(".btn-group.bulk-actions > ul.dropdown-menu").append($('#menu_item_springxbs').html());

    $('#springxbsRequestLabels')
        .on('show.bs.modal', function () {
            if ($(this).data('open')) {
                return;
            }

            $(this).data('open', true);

            var orderIDs = [],
                mBody = $('#springxbsRequestLabels .modal-body');

            $("input[name='orderBox[]']:checked").each(function () {
                orderIDs.push($(this).val());
            });

            $.get('{$slug|escape:'UTF-8':'UTF-8'}&ajax=1&action=bulkRequestLabels&id_orders=' + orderIDs.join(','), function (resp) {
                resp = JSON.parse(resp);
                mBody.html('<div class="alert alert-warning">{l s='Warning! After dismissing this modal window page will be reloaded!' mod='springxbs'}</div>');
                $('#springxbsRequestLabels').modal('show');

                var tbl = document.createElement('table'),
                    tbody = '<tbody>',
                    tns = [],
                    tnsTest = [],
                    isTest = true;

                tbl.id = 'requestLabelsResultTable';
                tbl.classList.add('table');

                for (var i = 0; i < resp.results.length; i++) {
                    for (var key in resp.results[i]) {
                        var tn;

                        switch (true) {
                            case (
                                resp.results[i][key].hasOwnProperty('shipment') &&
                                resp.results[i][key].shipment.hasOwnProperty('tracking_number')
                            ):
                                tn = resp.results[i][key].shipment.tracking_number;
                                isTest = resp.results[i][key].test_mode === '1';
                                break;
                            case (
                                resp.results[i][key].hasOwnProperty('api_result') &&
                                resp.results[i][key].api_result.hasOwnProperty('Shipment') &&
                                resp.results[i][key].api_result.Shipment.hasOwnProperty('TrackingNumber')
                            ):
                                tn = resp.results[i][key].api_result.Shipment.TrackingNumber;
                                isTest = resp.results[i][key].test_mode === '1';
                                break;
                            default:
                                tn = '';
                        }

                        if (tn.length > 0) {
                            if (isTest) {
                                tnsTest.push(tn);
                            } else {
                                tns.push(tn);
                            }
                        }

                        tbody += '<tr' + (i % 2 === 0 ? ' class="odd"' : '') + '><td>' + key + '</td><td>'
                            + tn + '</td><td><div style="margin:0" class="alert alert-'
                            + (resp.results[i][key].error ? 'danger' : 'success') + '">'
                            + (resp.results[i][key].error ? resp.results[i][key].error : resp.results[i][key].success)
                            + '</div></td></tr>';
                    }
                }

                tbl.innerHTML = '<thead><tr><th>{l s='Order ID' mod='springxbs'}</th><th>{l s='Tracking Number' mod='springxbs'}</th><th>{l s='Message' mod='springxbs'}</th></tr></thead>' + tbody + '</tbody>';

                if (tns.length < 1 && tnsTest.length < 1) {
                    $('#springxbsRequestLabels .modal-footer a:not([data-dismiss="modal"])').addClass('hidden');
                } else {
                    $('.springxbs-bulk-selector').each(function () {
                        $(this).attr(
                            'href',
                            $(this).data('href') + tns.join(',') + (tnsTest.length
                                ? '&tns_test=' + tnsTest.join(',')
                                : '')
                        );
                    });
                }

                mBody.append(tbl);
            });
        })
        .on('hide.bs.modal', function () {
            location.reload();
        });

    $('#springxbsModalDialog').on('show.bs.modal', function () {
        var tns_list = [],
            tns_list_test = [],
            html_list = [],
            testMode_text = $('#textModeEl').html();

        $(this).closest('form').find("[name='orderBox[]']:checked").each(function () {
            var $tnEl = $(this).closest('tr').find('.springxbs-tracking-number-here');

            if (!$tnEl.length) {
                return;
            }

            var tn = $tnEl.html().replace(/^\s*/, '').replace(/\s*$/, ''),
                isTest = !!$tnEl.data('istest');

            if (tn) {
                if (!isTest) {
                    tns_list.push(tn);
                } else {
                    tns_list_test.push(tn);
                }

                html_list.push('<li>' + tn + (isTest ? testMode_text : '') + '</li>')
            }
        });

        $('.springxbs-bulk-selector').each(function () {
            $(this).attr('href', $(this).data('href') + tns_list.join(',') +
                (tns_list_test.length ? '&tns_test=' + tns_list_test.join(',') : '')
            );
        });

        $('#springxbsModalDialog .modal-body').html(
            html_list.length
                ? '<ul class="springxbs-modal-labels">' + html_list.join('') + '</ul>'
                : '{l s='No labels selected' mod='springxbs'}'
        );

        $('#springxbsModalDialog .modal-footer').toggleClass('hidden', !html_list.length)
    });
</script>
