{**
 * @author    United Parcel Service of America, Inc.*
 * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
 * @license   This work is Licensed under the Academic Free License version 3.0http://opensource.org/licenses/afl-3.0.php*
 * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page*
 *}
<link href="/presta1781/modules/upsmodule/views/css/icon.css" rel="stylesheet" type="text/css">
 <div class="align-center">
    <table class="grid-table js-grid-table table" align="center" style="width: 50%; border: 1px solid #FDD204;">
        <tr style="background-color: #FDD204;">
            <th>Settings</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>SSL ON/OFF</td>
            <td>{$ssl_info}</td>
        </tr>
        <tr>
            <td>Maintenance mode ON/OFF</td>
            <td>{$maintainance_info}</td>
        </tr>
        <tr>
            <td>https://fa-ecptools-prd.azurewebsites.net</td>
            <td>{$url_check_info_1}</td>
        </tr>
        <tr>
            <td>https://onlinetools.ups.com/ </td>
            <td>{$url_check_info_2}</td>
        </tr>
        <tr>
            <td>https://fa-ecpanalytics-prd.azurewebsites.net </td>
            <td>{$url_check_info_3}</td>
        </tr>
    </table>
 </div>
