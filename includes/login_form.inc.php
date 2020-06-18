<?php
if( isset( $_GET[ 'msg' ] ) )
{
	echo '<div class="IndexMessage">' . $_GET[ 'msg' ] . '</div>';
}

if( isset( $_GET[ 'error' ] ) )
{
	echo '<div class="IndexError">' . $_GET[ 'error' ] . '</div>';
}
?>
<div class="txtbg2" style="margin-bottom:20px;">Nettleseren din må akseptere Cookies for at du skal kunne logge inn.</div>
<form action="login.php" method="post">
	<fieldset>
        <div class="FormField NoFloat">
			<b>E-postadresse:</b><br />
			<div class="FloatLeft" style="margin-right:8px";>
				<input type="text" id="email" name="email" size="40" maxlength="40"<?php
				if ( isset( $_POST[ 'email' ] ) )
				{
					echo ' value="' . $_POST[ 'email' ] . '"';
				}
			?> style="width:277px;<?php
				if( isset( $this->validation_exceptions[ 'email' ] ) )
				{
					echo ' border-color: #F00;';
				}
			?>" />
			</div>

			<div id="email_exception" class="validation_exception NoFloat">
				<?php 
					if( isset( $this->validation_exceptions ) && isset( $this->validation_exceptions[ 'email' ] ) )
					{
						echo $this->validation_exceptions[ 'email' ];
					}
				?>
			</div>
		</div>

        <div class="FormField NoFloat">
			<b>Passord:</b> <small>Kun bokstaver og tall. Må være 4-20 tegn.</small><br />
			<div class="FloatLeft" style="margin-right:8px";>
	            <input type="password" id="password" name="password" size="40" maxlength="20" style="width:277px;<?php
					if( isset( $this->validation_exceptions[ 'password' ] ) )
					{
						echo ' border-color: #F00;';
					}
				?>" /><br />
			</div>

			<div id="password_exception" class="validation_exception NoFloat">
				<?php 
					if( isset( $this->validation_exceptions[ 'password' ] ) )
					{
						echo $this->validation_exceptions[ 'password' ];
					}
				?>
			</div>
		</div>

        <div class="FormField NoFloat" style="color:#000; margin-top:15px;">
			<a href="forgot_password.php"><b>Glemt passord?</b></a>
		</div>

        <div class="FormField NoFloat" style="color:#000; margin-top:15px;">
	    	Har du ikke opprettet brukerkonto?<br />
	    	<a href="register_user.php"><b>Registrer deg her</b></a><br />
		</div>

	</fieldset>

    <div align="center">
		<input type="button" name="cancel" value="Avbryt" onclick="window.location='index.php'" />
    	<input type="submit" name="submit" value="Logg inn" />
	</div>

   	<input type="hidden" name="url" value="<?php echo $this->url; ?>" />
   	<input type="hidden" name="submitted" value="TRUE" />
</form>
