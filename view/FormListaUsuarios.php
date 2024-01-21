<?php session_start();
	header('Content-Type: text/html; charset=UTF-8');
	if (!isset($_SESSION['NombUser']) ){
		header ("Location: index.php");
		exit;
		}?>
	<!DOCTYPE html>
	<html lang="en">
	<?php include_once "../model/Usuario.php";
	$usuario = new Usuario;
	$LisUsuarios = $usuario->obtener();
	$Estilo = "pointer-events: none; text-decoration:line-through;";
	?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">

		<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

		<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

		<title>Registrar Administrador</title>

		<link href="../css/app.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	</head>

	<body>

		<main class="d-flex w-100">
		<?php include_once "../model/BarraLateral.php"; 
			BarraLateral(4)
		?>

			<div class="container d-flex flex-column">
			<?php BarraSuperior($_SESSION['NombUser'],$_SESSION['dniuser'],$_SESSION['RolUser'])?>
				<div class="row vh-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Lista de Usuarios Registrado</h1>
								<p class="lead">
									Datos sensibles
								</p>
							</div>

							<div class="container-fluid p-0">
						<div class="row">
							<div class="col-16 col-lg-16 col-xxl-16 d-flex">
								<div class="card flex-fill">
								
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th  >DNI</th>
												<th>Nombre de usuario </th>
												<th class="d-none d-xl-table-cell">Contraseña</th>
												<th class="d-none d-xl-table-cell">Rol</th>

											</tr>
										</thead>
										<tbody style="border: black 2.5px solid;">
											
											<?php foreach ($LisUsuarios as $User) { if($User->id==$_SESSION['dniuser']){}else{?>
												
												<tr>
													
												<td><?php echo $User->id ?></td>
													<td><?php echo $User->name ?></td>
													<td><?php echo "****"?></td>
													<td> <?php switch ($User->role){case 0:echo '<p style="background: #6ff77e ;font-weight: bold";>Administrador<p>';break;
													case 1:echo '<p style="background:  #faa06c  ;font-weight: bold";>Gerente<p>';break;
													case 2:echo '<p style="background:  #f7dc6f  ;font-weight: bold";>Vendedor<p>';break;
													}?></td>
													
													<td>
														<a href="../controller/CtrlEliminarUsuario.php?id=<?php echo $User->id ?>"  class="btn btn-danger" style ="<?php if($_SESSION['RolUser']==1){echo $Estilo; }?>">
															<i class="fa fa-trash-o"></i> Eliminar
														</a>
													</td>
												</tr>
											<?php }} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="../js/app.js"></script>

	</body>

	</html>
