<?php
    if(!isset($_SESSION['id_user'])):
        header('Location:' . BASE_URL. '/account/login');
    else:
		// var_dump($_SESSION);
?>

<section class="sectionPrincipal" id="index">
	<h2 style="text-transform: capitalize;" class="text-center mt-3">Olá, <?=$_SESSION["nome_user"]?></h5>

		<div class="container">


			<h4>Saldo atual</h4>

			<h1 id="balance" class="balance">R$ {{ultimoMovimento.saldoTotal}}</h1>

			<div class="inc-exp-container">
				<div>
					<h4>Receitas</h4>
					<p id="money-plus" class="money plus">+ R$0.00</p>
				</div>

				<div>
					<h4>Despesas</h4>
					<p id="money-minus" class="money minus">- R$0.00</p>
				</div>
			</div>

			<h3>Transações</h3>

			<ul id="transactions" class="transactions">
				<li v-for="mov in movimentosUser" v-bind:class="{'minus': mov.valor < 0, 'plus': mov.valor > 0}">
					<span class="text-truncate">{{mov.descricao}}</span>
					<span class="text-truncate">
						<span v-bind:class="{'text-danger': mov.valor < 0, 'text-success': mov.valor > 0}">{{mov.valor}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{mov.data}}
					</span>
						<button class="delete-btn">x</button>
				</li>
			</ul>

			<button class="btnAdicionar" data-bs-toggle="modal" data-bs-target="#novaTransacao">Adicionar transação</button>

			<div class="modal fade" tabindex="-1" id="novaTransacao">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Nova transação</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="form">
								<div class="form-control mb-3">
									<label for="text">Descrição</label>
									<input autofocus type="text" id="text" placeholder="Descrição da transação" />
									<label for="text">Categoria</label>
									<select class="form-select form-select-md">
										<option>AAA</option>
									</select>
									<label>Local</label>
									<input autofocus type="text" id="text" placeholder="Local da transação" />
								</div>

								<div class="form-control">
									<label for="amount">Valor <br />
										<small>
											(<span class="text-danger">negativo</span> - despesas,&nbsp;
											<span class="text-success">positivo</span> - receitas
											)
											</small>
									</label>
									<input type="number" id="amount" placeholder="Valor da transação" />
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btnCancelar">Cancelar</button>
							<button type="button" class="btnSalvar">Salvar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<script src="<?= BASE_URL. '/js/indexController.js' ?>"></script>
<?php endif; ?>