<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>
<p><br/><a href="<?php echo site_url(); ?>">&larr; <?php echo lang('us_back_to') . $this->settings_lib->item('site.title'); ?></a></p>

<div id="login">
	<h2 class='text-center'><?php echo lang('us_login'); ?></h2><br />

	<?php 
		$msg = Template::message(); 
		if($msg) :
	?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">	
		<?php echo $msg; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php
		if (validation_errors()) :
	?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-error fade in">
			  <a data-dismiss="alert" class="close">&times;</a>
				<?php echo validation_errors(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">	

	<?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>

		<div class="form-group <?php echo iif( form_error('login') , 'error') ;?>">
			<input class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
		</div>

		<div class="form-group <?php echo iif( form_error('password') , 'error') ;?>">
			<input class="form-control" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
		</div>

		<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
			<div class="form-group">
				<label class="checkbox" for="remember_me"></label>
				<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
				<span class="inline-help"><?php echo lang('us_remember_note'); ?></span>
			</div>
		<?php endif; ?>

		<div class="form-group text-center">
			<input class="btn btn-large btn-primary" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
		</div>
	<?php echo form_close(); ?>

	<?php // show for Email Activation (1) only
		if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
	<!-- Activation Block -->
			<p class="text-left well">
				<?php echo lang('bf_login_activate_title'); ?><br />
				<?php
				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
				$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
				echo $activate_str; ?>
			</p>
	<?php endif; ?>

	<div class="text-center">
		<?php if ( $site_open ) : ?>
			<?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?>
		<?php endif; ?>

		<br/><?php //echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
	</div>

	</div></div>

</div>