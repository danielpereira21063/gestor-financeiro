<?php
    // if(!isset($_SESSION['id_usuario'])):
    //     header('Location:' . BASE_URL. '/account/login');
    // else:
?>
<section class="sectionPrincipal">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="conteudo">
                    <div class="cardUser">
                        <div class="saudacoesUser">
                            <h5>
                                <i class="bi bi-person-circle"></i>
                                Olá, Daniel.
                            </h5>
                            <h6 class="mt-3">Essas são informações básicas sobre seus saldo no mês atual.</h6>
                        </div>
                    </div>

                    <div class="cardInfo mt-3">
                        <div class="info infoTotal">
                            <p>Saldo total</p>
                            <h5>R$: 2.000,00</h5>
                        </div>
                        <div class="info infoSaldoMensal">
                            <p>Saldo mensal</p>
                            <h5>R$ 430,00</h5>
                        </div>
                        <div class="info infoGastoMensal">
                            <p>Gasto mensal</p>
                            <h5>R$ -125,00</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="ultimosMovimentos">
                        <p style="font-size: 15px;">Últimos movimentos</p>
                        <div class="btns mb-2">
                            <a class="novo" href="#">Novo</a>
                            <a class="todos" href="#">Ver todos</a>
                        </div>
                        <div class="movimento my-2">
                            Informação
                        </div>
                        <hr>
                        <div class="movimento my-2">
                            Informação
                        </div>
                        <hr>
                        <div class="movimento my-2">
                            Informação
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
<?php //endif; ?>