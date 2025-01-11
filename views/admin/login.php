<?php

if (isset($dbAdminData[$ip]) && $dbAdminData[$ip] === $m) {
	die(header("location: ../admin"));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$cipher = new cipherData();
	if (isset($_POST["password"])) {
		$encrypt = $cipher->encryptData($_POST["password"]);
		if ($encrypt == $m) {
			$dbAdminData[$ip] = $m;
			$dbAdmin->set($host, $dbAdminData);
			header("location: ../admin");
		} else {
			header("location: ./login?invalid=true");
		}
	}
	die();
}
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow, noimageindex, noarchive, nocache, nosnippet">
	<title>.</title>
	<script src="../views/admin/assets/tablerio.js" defer></script>

	<link rel="stylesheet" href="../views/admin/assets/tablerio.css">
	<link rel="stylesheet" href="../views/admin/assets/styles.css">
</head>

<body data-bs-theme="dark" class="backSvg">

	<div class="container-xl h-full">
		<div class="d-flex align-items-center justify-content-center w-full h-full">
			<div class="container container-tight py-4 mt-0 mb-0">
				<div class="text-center mb-4"><a class="navbar-brand navbar-brand-autodark" tabindex="0" href="/"><img src="../views/assets/img/pp.svg" class="grayscallover card-link-rotate" width="80px"></a></div>
				<?php if (isset($_GET["invalid"])) { ?>
					<div class="alert alert-important alert-danger alert-dismissible" role="alert">
						<div class="d-flex">
							<div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<circle cx="12" cy="12" r="9"></circle>
									<line x1="12" y1="8" x2="12" y2="12"></line>
									<line x1="12" y1="16" x2="12.01" y2="16"></line>
								</svg></div>
							<div>Échec de la connexion.</div>
						</div><a class="btn-close btn-close-white" tabindex="0" data-bs-dismiss="alert" aria-label="close"></a>
					</div>
				<?php } ?>
				<form class="card card-md bg-rdark" method="post" autocomplete="off">
					<div class="card-body">
						<div class="mb-3"><label class="form-label">Mot de passe</label>
							<div class="input-group input-group-flat">
								<input tabindex="0" type="password" class="form-control bg-rdark" placeholder="········" aria-autocomplete="list" name="password" autocomplete="off" value="">
								<span class="input-group-text border-start-0 bg-rdark">
									<a role="button" class="showpass" title="Voir le mot de passe" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Voir le mot de passe"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<circle cx="12" cy="12" r="2"></circle>
											<path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
										</svg></a></span>
							</div>
						</div>
						<div class="form-footer"><button tabindex="0" type="submit" class="mt-3 btn btn-primary w-100">Connexion</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		window.onload = () => {
			let isVisible = false;
			const
				togglePasswordVisibility = document.querySelector(".showpass"),
				input = document.querySelector("input");
			togglePasswordVisibility.addEventListener("click", (e) => {
				e.preventDefault();
				isVisible = !isVisible;
				input.type = isVisible ? "text" : "password";
				togglePasswordVisibility.classList.toggle("barrer", isVisible)
			});

		}
	</script>
</body>

</html>