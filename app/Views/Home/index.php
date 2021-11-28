<?php
    if(!isset($_SESSION['id_user'])):
        header('Location:' . BASE_URL. '/account/login');
    else:
		// var_dump($_SESSION);
?>

<style>

	#modalTransacao input, #modalTransacao select {
		color: #2974d6;
	}
</style>

<section class="sectionPrincipal" id="index">
	<h2 style="text-transform: capitalize;" class="text-center mt-3">Olá, <?=$_SESSION["nome_user"]?></h5>

		<div class="container">


			<h4>Saldo total</h4>

			COLOCAR MES AQUI
			<br><br>

			<h1 id="balance" class="balance">R$ {{detalhes.saldo}}</h1>

			<div class="inc-exp-container">
				<div>
					<h4>Receitas</h4>
					<p id="money-plus" class="money plus">+ R$ {{detalhes.ganhoMensal}}</p>
				</div>

				<div>
					<h4>Despesas</h4>
					<p id="money-minus" class="money minus">R$ {{detalhes.gastoMensal}}</p>
				</div>
			</div>

			<h3>Transações</h3>

			<ul id="transactions" class="transactions">
				<li v-on:click="verMovimento(mov)" style="cursor: pointer" v-for="mov in movimentosUser" v-bind:class="{'minus': mov.valor < 0, 'plus': mov.valor > 0}">
					<span class="text-truncate">{{mov.descricao}}</span>
					<span class="text-truncate">
						<span v-bind:class="{'text-danger': mov.valor < 0, 'text-success': mov.valor > 0}">{{mov.valor}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{mov.data}}
					</span>
				</li>
			</ul>

			<button class="btnAdicionar" data-bs-toggle="modal" data-bs-target="#modalTransacao">Adicionar transação</button>

			<div class="modal fade" tabindex="-1" id="modalTransacao" data-bs-backdrop="static">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">{{vendoMovimento ? 'Editar transação' : 'Nova transação'}}
							</h5>
							<button v-on:click="vendoMovimento = false;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="form">
								<div class="form-control mb-3">
									<label for="text">Descrição</label>
									<input v-if="vendoMovimento" v-model="movimentoVisualizar.descricao" autofocus type="text" id="text" placeholder="Descrição da transação" />

									<input v-else v-model="newMovimento.descricao" autofocus type="text" id="text" placeholder="Descrição da transação" />

									<label for="text">Categoria</label>
									<select v-if="vendoMovimento" v-model="movimentoVisualizar.categoria" class="form-select form-select-md">
										<option disabled selected value="">Selecione uma categoria</option>
										<option selected value="ADICIONADO">Adicionado</option>
										<option selected value="DISPESAS">Dispesas</option>
										<option selected value="LANCHES">Lanches</option>
										<option selected value="MEDICAMENTOS">Medicamentos</option>
										<option selected value="OUTROS">Outros</option>
									</select>

									<select v-else v-model="newMovimento.categoria" class="form-select form-select-md">
										<option disabled selected value="">Selecione uma categoria</option>
										<option selected value="ADICIONADO">Adicionado</option>
										<option selected value="DISPESAS">Dispesas</option>
										<option selected value="LANCHES">Lanches</option>
										<option selected value="MEDICAMENTOS">Medicamentos</option>
										<option selected value="OUTROS">Outros</option>
									</select>

									<label>Local</label>
									<input v-if="vendoMovimento" v-model="movimentoVisualizar.local" autofocus type="text" id="text" placeholder="Local da transação" />
									<input v-else v-model="newMovimento.local" autofocus type="text" id="text" placeholder="Local da transação" />
								</div>

								<div class="form-control">
									<label for="amount">Valor <br />
										<small>
											(<span class="text-danger">negativo</span> - despesas,&nbsp;
											<span class="text-success">positivo</span> - receitas
											)
											</small>
									</label>
									<input v-bind:class="{'text-danger':movimentoVisualizar.valor <0}" v-if="vendoMovimento" type="number" v-model="movimentoVisualizar.valor" id="amount" placeholder="Valor da transação" />
									<input v-else type="number" v-model="newMovimento.valor" id="amount" placeholder="Valor da transação" />
								</div>
							</form>
						</div>
						<div class="modal-footer" v-if="vendoMovimento">
							<button v-on:click="vendoMovimento = false; removerMovimento();" type="button" class="btnCancelar" data-bs-dismiss="modal"><i class="bi bi-trash-fill"></i> Remover</button>
							<button v-on:click="editarTransacao()" type="button" class="btnSalvar">Salvar edição</button>
						</div>
						<div class="modal-footer" v-else>
							<button type="button" class="btnCancelar" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btnSalvar" v-on:click="saveTransacao()">Salvar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<script src="<?= BASE_URL. '/js/indexController.js' ?>"></script>
<?php endif; ?>