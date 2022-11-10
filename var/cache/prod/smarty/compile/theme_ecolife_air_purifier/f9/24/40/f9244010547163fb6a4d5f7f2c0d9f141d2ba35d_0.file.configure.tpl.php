<?php
/* Smarty version 3.1.43, created on 2022-06-24 17:35:29
  from '/var/www/html/prestashop/modules/shipstation/views/templates/admin/configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b62e217cf6d0_19257296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9244010547163fb6a4d5f7f2c0d9f141d2ba35d' => 
    array (
      0 => '/var/www/html/prestashop/modules/shipstation/views/templates/admin/configure.tpl',
      1 => 1656101900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b62e217cf6d0_19257296 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://use.fontawesome.com/bcc1b3cea5.js"><?php echo '</script'; ?>
>

<div class="shipstation informations panel col-lg-10 col-lg-offset-1">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="row shipstation_header">
            <div class="presentation col-lg-6">
                <div class="row">
                    <img class="shipstation-logo" src="/modules/shipstation/views/img/ShipStation-logo-black.png"/>
                    <p style="margin-bottom: 20px;">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logoText']->value,'htmlall','UTF-8' ));?>

                    </p>
                </div>
            </div>
            <div class="presentation login-links col-lg-6">
                <div class="row">
                    <p>
                        <a class="button" href="https://www.shipstation.com/partner-prestashop/" target="_blank"
                           rel="noopener noreferrer">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['startTrial']->value,'htmlall','UTF-8' ));?>

                        </a>
                    </p>
                    <p class="login-message">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['haveAccount']->value,'htmlall','UTF-8' ));?>

                        <a href="https://ss.shipstation.com" target="_blank" rel="noopener noreferrer">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['login']->value,'htmlall','UTF-8' ));?>

                        </a>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['now']->value,'htmlall','UTF-8' ));?>

                    </p>
                </div>
            </div>
        </div>
        <div class="row shipstation-content">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="col-lg-2">
                        <i class="fa fa-upload fa-3x" style="color: #7DCA36;"></i>
                    </div>
                    <div class="col-lg-10">
                        <p class="content">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['importOrders']->value,'htmlall','UTF-8' ));?>

                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <i class="fa fa-barcode fa-3x" style="color: #7DCA36;"></i>
                    </div>
                    <div class="col-lg-10">
                        <p class="content">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['createLabels']->value,'htmlall','UTF-8' ));?>

                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <i class="fa fa-edit fa-3x" style="color: #7DCA36;"></i>
                    </div>
                    <div class="col-lg-10">
                        <p class="content">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customizeViews']->value,'htmlall','UTF-8' ));?>

                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <i class="fa fa-magic fa-3x" style="color: #7DCA36;"></i>
                    </div>
                    <div class="col-lg-10">
                        <p class="content">
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['createRules']->value,'htmlall','UTF-8' ));?>

                        </p>
                    </div>
                </div>
                <div class="row">
                    <p class="content">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['activateAccount']->value,'htmlall','UTF-8' ));?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
  .informations {
    font-family: OpenSans-Regular, sans-serif;
    font-size: 16px;
    color: #363A41;
    letter-spacing: 0;
    line-height: 24px;
  }

  .shipstation {
    padding: 0 16px 20px !important;
  }

  .shipstation img {
    display: block;
    height: 57px;
    margin: 0;
  }

  .shipstation a.button, .shipstation a.button:hover, .shipstation a.button:active, .shipstation a.button:focus {
    display: inline-block;
    background-color: #24B9D7;
    border: 1px solid #24B9D7;
    border-radius: 1px;
    padding: 5px 40px;
    margin-right: 20px;
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
  }

  .shipstation_header {
    border-bottom: 1px solid #ccc;
    padding-top: 50px;
  }

  .shipstation-content {
    margin: 20px 0;
  }

  .shipstation-content img {
    width: 90px;
    height: 90px;
    margin-bottom: 15px;
  }

  .shipstation-content .row {
    margin: 15px 0 35px 0;
  }

  .shipstation-content .row:last-child {
    margin-bottom: 0;
  }

  .shipstation-content .row i {
    font-size: 34px;
  }

  .shipstation-content .row .title {
    color: #363A41;
    font-family: "Open Sans";
    font-size: 28px;
    line-height: 19px;
    font-weight: normal;
    margin-top: 6px;
    margin-bottom: 20px;
  }

  .shipstation-content .row .content {
    color: #6C868E;
    font-family: "Open Sans";
    font-size: 14px;
    line-height: 19px;
  }

  .shipstation-content .material-icons.green {
    color: #00b555;
  }

  .shipstation-content .material-icons.red {
    color: #f9001a;
  }

  .shipstation-content .material-icons.yellow {
    color: #ffc100;
  }

  .login-links {
    text-align: right;
    padding-top: 10px;
  }

  .login-message {
    font-size: 14px;
    padding-left: 40px;
    padding-right: 40px;
  }

  @media only screen and (max-width: 1240px) {
    .bgimage {
      display: none;
    }
  }
</style>
<?php }
}
