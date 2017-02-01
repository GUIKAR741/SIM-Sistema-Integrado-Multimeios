<?php
include_once '../Config/config.php';
include_once 'includes/header.php';
use App\Models\User;
use App\Classes\Login;
if ((isset($_SESSION['logado']))&&(isset($_SESSION['nome'])&&(isset($_SESSION['email']))&&($_SESSION['logado']==true))):
	header("Location:home.php?acao=home");
	exit;
endif;
if (isset($_POST['logar'])):
	$user=new App\Models\User();
	$login=new App\Classes\Login($user);

	$email =trim(strip_tags(filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING)));
	$password =trim(strip_tags(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING)));
	if (!$email == '' || !$password == ''){
		$login->setEmail($email);
		$login->setPassword($password);
		$logado = @$login->logar();//?true:false;
	}else{
		$logado=false;
	}
endif;
?>
	<body>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<?php
		if (isset($logado)):
			if ($logado == true):
				echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Logado no sistema!</strong> <b>Você sera redirecionado!</b> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
				header("Refresh:1.5 home.php?acao=home");
			else:
				echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Erro ao logar!</strong> <b>Tente Novamente!</b><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
				header("Refresh:1.5 index.php");
			endif;
		endif;
		if(isset($_GET['acao']) && !isset($_POST['logado']) && $_GET['acao']=='negado'):
			echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong> Acesso Negado!</strong> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
			header("Refresh:1.5 index.php");
		endif;
		if(isset($_GET['acao']) && !isset($_POST['logado']) && $_GET['acao']=='logout'):
			echo '<div class="alert bg-warning" role="alert">
                    <svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg> Obrigado por usar o sistema!</strong> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
			header("Refresh:1.5 index.php");
		endif;
		?>
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<form role="form" method="post">
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
<!--						<div class="checkbox">-->
<!--							<label>-->
<!--								<input name="remember" type="checkbox" value="Remember Me">Remember Me-->
<!--							</label>-->
<!--						</div>-->
						<button type="submit" name="logar" class="btn btn-primary">Login</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- /.col-->
</div><!-- /.row -->
<?php include_once 'includes/footer.php';?>