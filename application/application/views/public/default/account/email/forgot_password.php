<html>
<body>
	<h2><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></h2>
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('?key_forgotten='. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>