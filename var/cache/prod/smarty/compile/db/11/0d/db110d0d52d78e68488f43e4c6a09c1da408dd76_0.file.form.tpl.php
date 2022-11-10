<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:53:03
  from '/var/www/html/prestashop/modules/posstaticfooter/views/templates/admin/posstaticfooter/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf347f0912b8_01485618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db110d0d52d78e68488f43e4c6a09c1da408dd76' => 
    array (
      0 => '/var/www/html/prestashop/modules/posstaticfooter/views/templates/admin/posstaticfooter/helpers/form/form.tpl',
      1 => 1649431797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf347f0912b8_01485618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_138200208862bf347f064066_82854321', "script");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_82099799462bf347f064f61_08100610', "label");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_127826404062bf347f066a12_47585227', "legend");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198665216662bf347f070ff8_06493047', "input_row");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "script"} */
class Block_138200208862bf347f064066_82854321 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_138200208862bf347f064066_82854321',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


$(document).ready(function() {
  var control = $("#type_content");

  if (control.val() == 0)
  {
  $(".list_links").removeClass('hidden');
  $(".custom_content").addClass('hidden');
  }

  if (control.val() == 1) {
  $(".list_links").addClass('hidden');
  $(".custom_content").removeClass('hidden');
  }



  $("#type_content").change(function() {
    var control = $(this);

  if (control.val() == 0)
  {
  $(".list_links").removeClass('hidden');
  $(".custom_content").addClass('hidden');
  }

  if (control.val() == 1) {
  $(".list_links").addClass('hidden');
  $(".custom_content").removeClass('hidden');
  }
  });
});
<?php
}
}
/* {/block "script"} */
/* {block "label"} */
class Block_82099799462bf347f064f61_08100610 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'label' => 
  array (
    0 => 'Block_82099799462bf347f064f61_08100610',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'link_blocks') {?>

    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "label"} */
/* {block "legend"} */
class Block_127826404062bf347f066a12_47585227 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'legend' => 
  array (
    0 => 'Block_127826404062bf347f066a12_47585227',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>
        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['image']))) {?><img src="<?php echo $_smarty_tpl->tpl_vars['field']->value['image'];?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['title'],'html','UTF-8' ));?>
" /><?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['icon']))) {?><i class="<?php echo $_smarty_tpl->tpl_vars['field']->value['icon'];?>
"></i><?php }?>
        <?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

        <span class="panel-heading-action">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['toolbar_btn']->value, 'btn', false, 'k');
$_smarty_tpl->tpl_vars['btn']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['btn']->value) {
$_smarty_tpl->tpl_vars['btn']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['k']->value != 'modules-list' && $_smarty_tpl->tpl_vars['k']->value != 'back') {?>
                    <a id="desc-<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
-<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['imgclass']))) {
echo $_smarty_tpl->tpl_vars['btn']->value['imgclass'];
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}?>" class="list-toolbar-btn" <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['href']))) {?>href="<?php echo $_smarty_tpl->tpl_vars['btn']->value['href'];?>
"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['target'])) && $_smarty_tpl->tpl_vars['btn']->value['target']) {?>target="_blank"<?php }
if ((isset($_smarty_tpl->tpl_vars['btn']->value['js'])) && $_smarty_tpl->tpl_vars['btn']->value['js']) {?>onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>>
                        <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['btn']->value['desc']),$_smarty_tpl ) );?>
" data-html="true">
                            <i class="process-icon-<?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['imgclass']))) {
echo $_smarty_tpl->tpl_vars['btn']->value['imgclass'];
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}?> <?php if ((isset($_smarty_tpl->tpl_vars['btn']->value['class']))) {
echo $_smarty_tpl->tpl_vars['btn']->value['class'];
}?>" ></i>
                        </span>
                    </a>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </span>
    </h3>
<?php
}
}
/* {/block "legend"} */
/* {block "input_row"} */
class Block_198665216662bf347f070ff8_06493047 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_row' => 
  array (
    0 => 'Block_198665216662bf347f070ff8_06493047',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['preffix_wrapper']))) {?><div class="<?php echo $_smarty_tpl->tpl_vars['input']->value['preffix_wrapper'];?>
"><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'link_blocks') {?>
      <div class="container">
        <div class="row">
            <?php echo '<script'; ?>
 type="text/javascript">
                var come_from = '<?php echo $_smarty_tpl->tpl_vars['name_controller']->value;?>
';
                var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
                var alternate = 1;
            <?php echo '</script'; ?>
>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'link_blocks_position', false, 'key', 'blocksLoop', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['link_blocks_position']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['link_blocks_position']->value) {
$_smarty_tpl->tpl_vars['link_blocks_position']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index']++;
?>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <?php echo $_smarty_tpl->tpl_vars['link_blocks_position']->value['hook_name'];?>

                             <small><?php echo $_smarty_tpl->tpl_vars['link_blocks_position']->value['hook_title'];?>
</small>
                        </div>
                        <div class="cms" id="link_block_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link_blocks_position']->value['blocks'], 'link_block');
$_smarty_tpl->tpl_vars['link_block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link_block']->value) {
$_smarty_tpl->tpl_vars['link_block']->do_else = false;
?>
                            <div class="pos-block col-sm-<?php echo $_smarty_tpl->tpl_vars['link_block']->value['width'];?>
" id="footerblock_<?php echo $_smarty_tpl->tpl_vars['link_block']->value['id_posstaticfooter'];?>
">
                              <div class="block-container" style="border: 1px solid #ccc;">
                                <div class="panel-position">
                                  <i class="icon icon-arrows"></i>
                                </div>
                                <div class="panel-content">
                                  <div class="btn-group-action">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&amp;edit<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
&amp;id_posstaticfooter=<?php echo (int)$_smarty_tpl->tpl_vars['link_block']->value['id_posstaticfooter'];?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
">
                                            <i class="icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>

                                        </a>
                                        <a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&amp;delete<?php echo $_smarty_tpl->tpl_vars['identifier']->value;?>
&amp;id_posstaticfooter=<?php echo (int)$_smarty_tpl->tpl_vars['link_block']->value['id_posstaticfooter'];?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
">
                                            <i class="icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>

                                        </a>
                                    </div>
                                  </div>
                                  <h4><?php echo $_smarty_tpl->tpl_vars['link_block']->value['block_name'];?>
</h4>
                                </div>
                              </div>
                            </div>
                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        
                    </div>
                </div>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_blocksLoop']->value['index'] : null)%2) {?><div class="clearfix"></div><?php }?>
                <?php echo '<script'; ?>
 type="text/javascript">
                  var $myColumns = $("#link_block_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
");
                  $myColumns.sortable({
                    opacity: 0.9,
                    cursor: "move",
                    start: function(){
                      $(this).css('background','#f1f1f1');
                    },
                    stop: function(){
                      $(this).css('background','#ffffff');
                    },
                    update: function() {
                      var order1 = $(this).sortable("serialize") + "&action=updatePositions";
                      $.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8' ));?>
/index.php?controller=AdminStaticFooter&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
", order1);
                      }
                    });
                  $myColumns.hover(function() {
                    $(this).css("cursor","move");
                    },
                    function() {
                    $(this).css("cursor","auto");
                  });
                <?php echo '</script'; ?>
>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
      
      <style>
        .panel {
          float: left;
          width: 100%;
        }
        .block-container {
          border: 1px solid #ccc;
          float: left;
          width: 100%;
          position: relative;
          background: #f1f1f1;
        }
        .block-container .panel-position {
          float: left;
          width: 35px;
        }
        .block-container .panel-position i {
          padding-left: 10px;
          position: absolute;
          top: 50%;
          margin-top: -6px;
        }
        .panel-content {
          margin-left: 36px;
          border-left: 1px solid #ccc;
          background: #fff;
        }
        .block-container h4 {
          margin: 0;
          clear: both;
          padding: 10px 0 10px 10px;
        }
        .block-container .btn-group-action {
          float: right;
          clear:both;
          width: 100%;
          border-bottom: 1px dotted #ccc;
          padding: 5px;
        }
        .block-container .btn-group-action a:first-child {
          margin-right: 5px !important;
        }
      </style>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'cms_pages') {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'cms_category');
$_smarty_tpl->tpl_vars['cms_category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cms_category']->value) {
$_smarty_tpl->tpl_vars['cms_category']->do_else = false;
?>
      <div class="row">
        <div class="col-lg-9 col-lg-offset-3">
          <div class="panel">
            <div class="panel-heading">
              <?php echo $_smarty_tpl->tpl_vars['input']->value['label'];?>
 - <?php echo $_smarty_tpl->tpl_vars['cms_category']->value['name'];?>

            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, '<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
', this.checked)" />
                  </th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ID','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cms_category']->value['pages'], 'page', false, 'key');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                  <tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2) {?>class="alt_row"<?php }?>>
                    <td>
                      <input type="checkbox" class="cmsBox" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['page']->value['id_cms'],$_smarty_tpl->tpl_vars['fields_value']->value['content']['cms'])) {?>checked="checked"<?php }?> />
                    </td>
                    <td class="fixed-width-xs">
                      <?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>

                    </td>
                    <td>
                      <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value['title'] ));?>

                      </label>
                    </td>
                  </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'product_pages' || $_smarty_tpl->tpl_vars['input']->value['type'] == 'static_pages') {?>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'cms_category');
$_smarty_tpl->tpl_vars['cms_category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cms_category']->value) {
$_smarty_tpl->tpl_vars['cms_category']->do_else = false;
?>
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <div class="panel-heading">
                <?php echo $_smarty_tpl->tpl_vars['input']->value['label'];?>

              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, '<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
', this.checked)" />
                    </th>
                    <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cms_category']->value['pages'], 'page', false, 'key');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                    <tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2) {?>class="alt_row"<?php }?>>
                      <td>
                        <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'product_pages') {?>
                          <input type="checkbox" class="cmsBox" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['page']->value['id_cms'],$_smarty_tpl->tpl_vars['fields_value']->value['content']['product'])) {?>checked="checked"<?php }?> />
                        <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'static_pages') {?>
                          <input type="checkbox" class="cmsBox" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['page']->value['id_cms'],$_smarty_tpl->tpl_vars['fields_value']->value['content']['static'])) {?>checked="checked"<?php }?> />
                        <?php }?>
                      </td>
                      <td>
                        <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['page']->value['id_cms'];?>
">
                          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value['title'] ));?>

                        </label>
                      </td>
                    </tr>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'custom_pages') {?>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <div class="panel-heading">
                <?php echo $_smarty_tpl->tpl_vars['input']->value['label'];?>
 - <?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>

              </div>
              <table class="table js-custom-links-table-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
">
                <thead>
                <tr>
                  <th></th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'URL','d'=>'Modules.Linklist.Admin'),$_smarty_tpl ) );?>
</th>
                </tr>
                </thead>
                <tbody>
                <tr class="js-custom-link-row-template-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
" data-item="0" style="display: none">
                  <td class="col-md-1"><a href="#" class="js-clear-custom-link" style="display: none"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                  <td class="col-md-2">
                    <label class="control-label">
                      <input type="text" name="custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][0][title]"/>
                    </label>
                  </td>
                  <td class="col-md-9">
                    <label class="control-label col-md-12">
                      <input type="text" name="custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][0][url]"/>
                    </label>
                  </td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'][$_smarty_tpl->tpl_vars['lang']->value['id_lang']], 'page', false, 'key');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                  <tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2) {?>class="alt_row"<?php }?> data-item="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                    <td><a href="#" class="js-clear-custom-link"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                    <td>
                      <label class="control-label">
                        <input type="text" name="custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
"/>
                      </label>
                    </td>
                    <td>
                      <label class="control-label">
                        <input type="text" name="custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][url]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['url'];?>
"/>
                      </label>
                    </td>
                  </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
              </table>
              <div class="panel-footer">
                <a href="#" class="js-add-custom-link-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
 btn btn-default pull-right"><i class="process-icon-new"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</a>
              </div>
            </div>
          </div>
        </div>

        <?php echo '<script'; ?>
 type="application/javascript">
          $(document).ready(function() {
            function clearCustomLink () {
              $(this).closest('tbody').find('tr:last-of-type > td > a.js-clear-custom-link').hide();
              $(this).closest('tr').remove();

              return false;
            }

            $('a.js-clear-custom-link').click(clearCustomLink);

            function addCustomLinkRow() {
              var tbody = $('table.js-custom-links-table-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
 > tbody');
              var lastTr = tbody.find('tr:last-of-type');
              var i = lastTr ? lastTr.data('item') + 1 : 0;

              tbody.find('tr:nth-last-of-type(2) > td > a').show();

              var tpl = $('tr.js-custom-link-row-template-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
').clone();
              tpl.removeClass('js-custom-link-row-template-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
');
              tpl.data('item', i);
              tpl.find('td:nth-of-type(2) input').attr('name', 'custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][' + i + '][title]');
              tpl.find('td:nth-of-type(3) input').attr('name', 'custom[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][' + i + '][url]');
              tpl.find('a.js-clear-custom-link').click(clearCustomLink);
              tpl.show();
              tbody.append(tpl);

              tbody.find('tr > td > a.js-clear-custom-link').show();
              tbody.find('tr:last-of-type > td > a.js-clear-custom-link').hide();
            }

            addCustomLinkRow();

            $('a.js-add-custom-link-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
').click(function () {
              addCustomLinkRow();

              return false;
            });
          });
        <?php echo '</script'; ?>
>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }?>
  <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['preffix_wrapper']))) {?></div><?php }
}
}
/* {/block "input_row"} */
}
