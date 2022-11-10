<?php
/* Smarty version 3.1.43, created on 2022-07-08 11:21:41
  from '/var/www/html/prestashop/modules/posslideshows/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62c84b85e9dc09_48537354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b34c8a588fd6078568570cedd4429fcf7fe83bcb' => 
    array (
      0 => '/var/www/html/prestashop/modules/posslideshows/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1649431797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c84b85e9dc09_48537354 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155023886062c84b85e78f88_49910875', "field");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_155023886062c84b85e78f88_49910875 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_155023886062c84b85e78f88_49910875',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file_lang') {?>
		<div class="row">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
				<?php }?>
					<div class="col-lg-6">
						<?php if ((isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['images']))) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['image_baseurl']->value;
echo $_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']];?>
" class="img-thumbnail" />
						<?php }?>
						<div class="dummyfile input-group">
							<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" type="file" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="hide-file-upload" />
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-name" type="text" class="disabled" name="filename" readonly />
							<span class="input-group-btn">
								<button id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a file','mod'=>'posslideshows'),$_smarty_tpl ) );?>

								</button>
							</span>
						</div>
					</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="col-lg-2">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
							<li><a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a></li>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
					</div>
				<?php }?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					</div>
				<?php }?>
				<?php echo '<script'; ?>
>
				$(document).ready(function(){
					$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-selectbutton').click(function(e){
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
').trigger('click');
					});
					$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
').change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$('#<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
-name').val(file[file.length-1]);
					});
				});
			<?php echo '</script'; ?>
>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'custom_des') {?>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
			  <li class="nav-item" style="margin-left:3px;">
			    <a class="nav-link" href="#<?php echo $_smarty_tpl->tpl_vars['lang']->value['iso_code'];?>
" data-toggle="tab" role="tab"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a>
			  </li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
		<div class="tab-content" id="myTabContent">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
		<div class="tab-pane fade" id="<?php echo $_smarty_tpl->tpl_vars['lang']->value['iso_code'];?>
" role="tabpanel">
        <div class="row">
          <div class="col-lg-9 col-lg-offset-3">
            <div class="panel">
              <table class="table js-custom-links-table-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
">
                <thead>
                <tr>
                  <th></th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name','mod'=>'posslideshows'),$_smarty_tpl ) );?>
</th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Group display','mod'=>'posslideshows'),$_smarty_tpl ) );?>
</th>
                  <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Animation','mod'=>'posslideshows'),$_smarty_tpl ) );?>
</th>
                </tr>
                </thead>
                <tbody>
                <tr class="js-custom-link-row-template-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
" data-item="0" style="display: none">
                  <td class="col-md-1"><a href="#" class="js-clear-custom-link" style="display: none"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                  <td class="col-md-7">
                      <input type="text" name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][0][title]"/>
                  </td>
                  <td class="col-md-2">
                        <select name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][0][display]">
                        	<option value="0">h2 tag</option>
                        	<option value="1">h3 tag</option>
                        	<option value="2">h4 tag</option>
                        	<option value="3">h5 tag</option>
                        	<option value="4">p tag</option>
                        	<option value="5">button</option>
                        </select>
                  </td>
                  <td class="col-md-2">
                        <select name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][0][animation]">
                        	<option value="0">bounceIn</option>
                        	<option value="1">bounceInDown</option>
                        	<option value="2">bounceInLeft</option>
                        	<option value="3">bounceInRight</option>
                        	<option value="4">bounceInUp</option>	
							<option value="5">fadeIn</option>
                        	<option value="6">fadeInDown</option>
                        	<option value="7">fadeInLeft</option>
                        	<option value="8">fadeInRight</option>
                        	<option value="9">fadeInUp</option>
							<option value="10">zoomIn</option>
                        	<option value="11">zoomInDown</option>
                        	<option value="12">zoomInLeft</option>
                        	<option value="13">zoomInRight</option>
                        	<option value="14">zoomInUp</option>	
							<option value="15">rotateIn</option>
                        	<option value="16">rotateInDownLeft</option>
                        	<option value="17">rotateInDownRight</option>
                        	<option value="18">rotateInUpLeft</option>
                        	<option value="19">rotateInUpRight</option>
							<option value="20">pulse</option>
                        	<option value="21">flipInX</option>
                        	<option value="22">jackInTheBox</option>
                        	<option value="23">rollIn</option>
                        </select>
                  </td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'][$_smarty_tpl->tpl_vars['lang']->value['id_lang']], 'page', false, 'key');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                  <tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2) {?>class="alt_row"<?php }?> data-item="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="test">
                    <td><a href="#" class="js-clear-custom-link"><i class="material-icons action-disabled">&#xE14C;</i></a></td>
                    <td>
                        <input type="text" name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
"/>
                    </td>
                    <td>
                        <select name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][display]">						
                        	<option value="0" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 0) {?>selected="selected"<?php }?>>h2 tag</option>
                        	<option value="1" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 1) {?>selected="selected"<?php }?>>h3 tag</option>
							<option value="2" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 2) {?>selected="selected"<?php }?>>h4 tag</option>
                        	<option value="3" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 3) {?>selected="selected"<?php }?>>h5 tag</option>
							<option value="4" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 4) {?>selected="selected"<?php }?>>p tag</option>
                        	<option value="5" <?php if ($_smarty_tpl->tpl_vars['page']->value['display'] == 5) {?>selected="selected"<?php }?>>button</option>
                        </select>
                    </td>
                    <td>
                        <select name="description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][animation]">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 0) {?>selected="selected"<?php }?>>bounceIn</option>
                        	<option value="1" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 1) {?>selected="selected"<?php }?>>bounceInDown</option>
                        	<option value="2" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 2) {?>selected="selected"<?php }?>>bounceInLeft</option>
                        	<option value="3" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 3) {?>selected="selected"<?php }?>>bounceInRight</option>
                        	<option value="4" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 4) {?>selected="selected"<?php }?>>bounceInUp</option>	
							<option value="5" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 5) {?>selected="selected"<?php }?>>fadeIn</option>
                        	<option value="6" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 6) {?>selected="selected"<?php }?>>fadeInDown</option>
                        	<option value="7" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 7) {?>selected="selected"<?php }?>>fadeInLeft</option>
                        	<option value="8" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 8) {?>selected="selected"<?php }?>>fadeInRight</option>
                        	<option value="9" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 9) {?>selected="selected"<?php }?>>fadeInUp</option>
							<option value="10" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 10) {?>selected="selected"<?php }?>>zoomIn</option>
                        	<option value="11" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 11) {?>selected="selected"<?php }?>>zoomInDown</option>
                        	<option value="12" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 12) {?>selected="selected"<?php }?>>zoomInLeft</option>
                        	<option value="13" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 13) {?>selected="selected"<?php }?>>zoomInRight</option>
                        	<option value="14" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 14) {?>selected="selected"<?php }?>>zoomInUp</option>	
							<option value="15" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 15) {?>selected="selected"<?php }?>>rotateIn</option>
                        	<option value="16" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 16) {?>selected="selected"<?php }?>>rotateInDownLeft</option>
                        	<option value="17" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 17) {?>selected="selected"<?php }?>>rotateInDownRight</option>
                        	<option value="18" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 18) {?>selected="selected"<?php }?>>rotateInUpLeft</option>
                        	<option value="19" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 19) {?>selected="selected"<?php }?>>rotateInUpRight</option>
							<option value="20" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 20) {?>selected="selected"<?php }?>>pulse</option>
                        	<option value="21" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 21) {?>selected="selected"<?php }?>>flipInX</option>
                        	<option value="22" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 22) {?>selected="selected"<?php }?>>jackInTheBox</option>
                        	<option value="23" <?php if ($_smarty_tpl->tpl_vars['page']->value['animation'] == 23) {?>selected="selected"<?php }?>>rollIn</option>    	
                        </select>
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
          	$('#myTab li').eq(0).addClass('active');
          	$('#myTabContent .tab-pane').eq(0).addClass('active').addClass('in');
            function clearCustomLink () {
              $(this).closest('tbody').find('tr:last-of-type > td > a.js-clear-custom-link').hide();
              $(this).closest('tr').remove();

              return false;
            }

            $('a.js-clear-custom-link').click(clearCustomLink);

            function addCustomTextRow() {
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

              tpl.find('td:nth-of-type(2) input').attr('name', 'description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][' + i + '][title]');
              tpl.find('td:nth-of-type(3) select').attr('name', 'description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][' + i + '][display]');
              tpl.find('td:nth-of-type(4) select').attr('name', 'description[<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
][' + i + '][animation]');
              tpl.find('a.js-clear-custom-link').click(clearCustomLink);
              tpl.show();
              tbody.append(tpl);

              tbody.find('tr > td > a.js-clear-custom-link').show();
              tbody.find('tr:last-of-type > td > a.js-clear-custom-link').hide();
            }

            addCustomTextRow();

            $('a.js-add-custom-link-<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
').click(function () {
              addCustomTextRow();

              return false;
            });
          });
        <?php echo '</script'; ?>
>
       </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
	<?php }?>
	<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

<?php
}
}
/* {/block "field"} */
}
