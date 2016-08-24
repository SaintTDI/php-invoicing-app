<?php /* Smarty version Smarty-3.0.8, created on 2015-02-16 18:33:42
         compiled from "/var/www/app/templates/./cuenta/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173707352654e229f65ccdb6-77506997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8166763ec10391e9fdc239d35f47b22ba4a95fd' => 
    array (
      0 => '/var/www/app/templates/./cuenta/index.tpl',
      1 => 1423969397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173707352654e229f65ccdb6-77506997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_geturl')) include '/var/www/app/include/Templater/plugins/function.geturl.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('section','cuenta');$_template->assign('subsection','index'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<?php if (!$_smarty_tpl->getVariable('fp')->value->hasError()){?>
    		<?php if ($_GET['submitted']){?>
        		<div class="success">
            		Tu plan fue actualizado con &eacute;xito.
        		</div>
        	<?php }?>
<?php }?>

<div class="title" id="form_total_invoices">
		<label for="form_total_invoices"><h3>Tu Perfil:</h3></label>
</div>
<div class="left_form">
	  <?php if ($_smarty_tpl->getVariable('fp')->value->first_name){?>
	  <div class="ficha_row" id="form_name_container">
		  <label for="form_email">Nombre:</label>
		  <div class="ficha_text"><?php echo ucfirst($_smarty_tpl->getVariable('fp')->value->first_name);?>
 <?php echo ucfirst($_smarty_tpl->getVariable('fp')->value->middle_name);?>
</div>
	  </div>
	 <?php }?>
	 <?php if ($_smarty_tpl->getVariable('fp')->value->last_name){?>
	  <div class="ficha_row" id="form_name_container">
		  <label for="form_email">Apellido:</label>
		  <div class="ficha_text"><?php echo ucfirst($_smarty_tpl->getVariable('fp')->value->last_name);?>
 <?php echo ucfirst($_smarty_tpl->getVariable('fp')->value->second_last_name);?>
</div>
	  </div>
	 <?php }?>
	 <?php if ($_smarty_tpl->getVariable('fp')->value->email){?>
     <div class="ficha_row" id="form_email_container">
        <label for="form_email">Correo Electr&oacute;nico:</label>
   		<div class="ficha_text"><?php echo $_smarty_tpl->getVariable('fp')->value->email;?>
</div>
     </div>
     <?php }?>
	 <?php if ($_smarty_tpl->getVariable('fp')->value->country){?>
     <div class="ficha_row" id="form_country_container">
        <label for="form_country">Pa&iacute;s:</label>
   		<div class="ficha_text"><?php echo $_smarty_tpl->getVariable('fp')->value->country;?>
</div>
     </div>
     <?php }?>
     
	<div class="profile">
	        <label for="bt_">
	        		<a class="submit6" href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'detalles'),$_smarty_tpl);?>
">Editar Perfil</a>
			</label>
	</div>
</div>
<?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?>
	<?php if ($_smarty_tpl->getVariable('default_company')->value&&'default_id'){?>
	<div class="right_form">
		  <?php if ($_smarty_tpl->getVariable('default_company')->value){?>
		  <div class="ficha_row" id="form_comp_container">
			  <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"||$_smarty_tpl->getVariable('identity')->value->user_type=="employee"){?><label for="form_email">Tu Empresa:</label><?php }else{ ?><label for="form_email">Empresa:</label><?php }?>
			  <div class="ficha_text"><?php echo ucfirst($_smarty_tpl->getVariable('default_company')->value);?>
</div>
		  </div>
		 <?php }?>
		 <?php if ($_smarty_tpl->getVariable('default_id')->value){?>
		  <div class="ficha_row" id="form_id_container">
			  <label for="form_email">ID Fiscal:</label>
			  <div class="ficha_text"><?php echo ucfirst($_smarty_tpl->getVariable('default_id')->value);?>
</div>
		  </div>
		 <?php }?>
		<div class="profile">
		        <label for="bt_">
		        		<a class="submit6" href="<?php echo smarty_function_geturl(array('controller'=>'cuenta','action'=>'empresa'),$_smarty_tpl);?>
">Editar Empresa</a>
				</label>
		</div>	
	</div>
	<?php }?>
<?php }?>
    
   <div class="plans">
    <?php if ($_smarty_tpl->getVariable('identity')->value->user_type=="proprietary"){?>
     <form method="post" id="form_id" action="<?php echo smarty_function_geturl(array('action'=>'plan'),$_smarty_tpl);?>
" id="registration-form">
        			<div id="plan-title">
						Tu Plan Actual: <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan1"){?>Plan UNO<?php }elseif($_smarty_tpl->getVariable('fp')->value->plan=="plan3"){?>Plan TRES<?php }elseif($_smarty_tpl->getVariable('fp')->value->plan=="plan5"){?>Plan CINCO<?php }elseif($_smarty_tpl->getVariable('fp')->value->plan=="trial_plan1"){?>Plan UNO (Trial de 30 d&iacute;as gratis)<?php }elseif($_smarty_tpl->getVariable('fp')->value->plan=="trial_plan3"){?>Plan TRES (Trial de 30 d&iacute;as gratis)<?php }elseif($_smarty_tpl->getVariable('fp')->value->plan=="trial_plan5"){?>Plan CINCO (Trial de 30 d&iacute;as gratis)<?php }?>
                </div>
                   
				<table class="plan_change">
					<!-- Table header -->
					
						<thead>
							<tr>
								<th scope="col"><img src="/images/icons/number_1_150.png" alt="Plan UNO"></th>
								<th scope="col"><img src="/images/icons/number_3_150.png" alt="Plan TRES"></th>
								<th scope="col"><img src="/images/icons/number_5_150.png" alt="Plan CINCO"></th>
								<th scope="col"><img src="/images/icons/plus_u_150.png" alt="Usuario Adicional"></th>
							</tr>
						</thead>
					
					<!-- Table footer -->
					
						<tfoot>
					        <tr>
					              <td><button class="submit8" value="trial_plan1" name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_plan3"  name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_plan5" name="plan" type="submit">Actualizar Plan</button></td>
					              <td><button class="submit8" value="trial_user" name="plan" type="submit" disabled>Agregar Usuario</button></td>
					        </tr>
						</tfoot>
					
					<!-- Table body -->
					
						<tbody>
							<tr>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan1"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan1"){?>class="active"<?php }?>><span>Plan UNO</span></td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan3"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan3"){?>class="active"<?php }?>><span>Plan TRES</span></td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan5"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan5"){?>class="active"<?php }?>><span>Plan CINCO</span></td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan2=="add"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_add"){?>class="active"<?php }?>><span>Usuario Adicional</span></td>
							</tr>
							
							<tr>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan1"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan1"){?>class="active"<?php }?>>El plan preferido por aut&oacute;nomos y empresas en per&iacute;odo de arranque. 1 Usuario, con acceso a todas las herramientas de <strong>WebProAdmin</strong>.</td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan3"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan3"){?>class="active"<?php }?>>El mejor plan para peque&ntilde;as empresas y despachos. Todas las ventajas del Plan UNO, para 3 usuarios de una misma cuenta.</td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan=="plan5"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_plan5"){?>class="active"<?php }?>>El plan para empresas consolidadas, con m&uacute;ltiples equipos de trabajo. Para 5 usuarios. Tu configuras qui&eacute;n tiene acceso a cada herramienta.</td>
								<td <?php if ($_smarty_tpl->getVariable('fp')->value->plan2=="add"||$_smarty_tpl->getVariable('fp')->value->plan=="trial_add"){?>class="active"<?php }?>>&iquest;Quieres que otro colaborador tenga acceso a tu cuenta? Agrega un usuario adicional.</td>
							</tr>
						</tbody>
				</table>
    		</form>
    	<?php }?>
   </div>


<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>