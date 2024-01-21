<?php session_start();
header('Content-Type: text/html; charset=UTF-8');
if (!isset($_SESSION['NombUser']) ){
    header ("Location: index.php");
    exit;
    }?>
<!DOCTYPE html>
<html lang="en">

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
		BarraLateral(3)
	?>

		<div class="container d-flex flex-column">
		<?php BarraSuperior($_SESSION['NombUser'],$_SESSION['dniuser'],$_SESSION['RolUser'])?>
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Registrar Empleado</h1>
							<p class="lead">
								Valide bien los datos antes de registrar
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="../controller/CtrlRegistrarAdmin.php" method="POST" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">DNI usuario</label>
											<input class="form-control form-control-lg" type="text" name="dnipost" placeholder="Ingrese el DNI" />
										</div>
										<div class="mb-3">
											<label class="form-label">Nombre</label>
											<input class="form-control form-control-lg" type="text" name="nombrepost" placeholder="Nombre y apellido" />
										</div>
										<div class="mb-3">
											<label class="form-label">Correo </label>
											<input class="form-control form-control-lg" type="text" name="userpost" placeholder="Ingrese el correo" />
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="passpost" placeholder="Ingrese la contraseña temporal" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tipo de Usuario </label>
											<select name="Seleccion" class="combo">
												<option value="0">Administrador</option>
												<option value="1" >Gerente</option>
												<option value="2">Vendedor</option>
												</select>
										</div>
										<div class="text-center mt-3">
										<button class="btn btn-primary btn-lg" type="submit">Crear Usuario</button>
										
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>