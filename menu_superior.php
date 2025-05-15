<a class="navbar-brand">DGSUAS</a>
<!-- Botão do menu sanduíche para dispositivos móveis -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<!-- Links da barra de navegação -->
<div class="collapse navbar-collapse" id="navbarNav">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="inicio.php">Página Inicial</a>
		</li>
		<?php
			if(isset($_SESSION['codPerm'])){
				if(mb_substr($_SESSION['codPerm'], 0, 1)==="1"){
					echo '<li class="nav-item">
							<a class="nav-link" href="adm.php">ADM</a>
						</li>';
				}
				else{
					echo '<li class="nav-item">
							<a class="nav-link" href="detalhes_OSC.php">SCFV</a>
						</li>';
				}
			}
		?>
		<li class="nav-item">
			<a class="nav-link" href="contato.php">Contato</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="login.php">Sair</a>
		</li>
	</ul>
</div>