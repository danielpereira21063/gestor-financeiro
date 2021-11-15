<?php
    // if(!isset($_SESSION['id_usuario'])):
    //     header('Location:' . BASE_URL. '/account/login');
    // else:
?>
<section class="sectionPrincipal">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="conteudo">
                <div class="semEstilo">

                    <div class="cardUser float-lg-start">
                        <div class="saudacoesUser">
                            <h5>
                                <i class="bi bi-person-circle"></i>
                                Olá, Daniel.
                            </h5>
                            <h6 class="mt-3">Essas são informações básicas sobre seu saldo no mês atual.</h6>
                        </div>
                    </div>

                    <div class="cardInfo mt-3 d-none d-lg-flex float-end">
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
                </div>


                <div class="cardInfo mt-3 d-lg-none d-flex">
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

                <!-- <hr> -->
                <h5 class="mt-5 mb-3">Últimos movimentos</h1>
                    <div class="ultimosMovimentos">
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