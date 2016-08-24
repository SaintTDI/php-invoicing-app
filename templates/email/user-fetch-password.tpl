{$user->username|ucfirst}, una solicitud de cambio de datos
<p>Estimado(a) {$user->username|ucfirst},</p>

<p>Hemos recibido una solicitud de cambio de contrase&ntilde;a.</p>

<p>Si no realizaste esta solicitud, por favor ignora este correo. Si deseas activar tu nueva contrase&ntilde;a has click en el siguiente link:</p>

<p>URL de activaci&oacute;n: https://app.webproadmin.com/cuenta/recuperarpassword?action=confirm&id={$user->getId()}&key={$user->profile->new_password_key}<br>
Usuario: {$user->username}<br>
Nueva contrase&ntilde;a: {$user->_newPassword}</p>

<p>En casos de dudas por favor env&iacute;anos un reporte a info@webproadmin.com</p>

<p>&Eacute;xitos,</p>

<p><a href="http://webproadmin.com" target="_blank">WebProAdmin</a></p>