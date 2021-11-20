<section class="sectionPrincipal">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5">

                <div class="divLogin" id="divLogin">
                    <div class="cardLogin">
                        <h4 class="mb-0">
                            Entrar no sistema
                        </h4>
                        <hr>
                        <div class="grupoInput">
                            <label>Usuário</label>
                            <br>
                            <i class="bi bi-person-circle"></i>
                            <input v-model="dados.user" type="text" placeholder="@daniel">
                        </div>
                        <div class="grupoInput">
                            <label>Senha</label>
                            <br>
                            <i class="bi bi-shield-lock-fill"></i>
                            <input v-model="dados.senha" type="text" placeholder="******">
                        </div>

                        <button v-on:click="fazerLogin()" class="btnEntrar">Entrar</button>

                        <div class="criarConta">
                            Não tem uma conta?
                            <a href="<?=BASE_URL . '/account/criar'?>">
                                Criar conta
                            </a>
                        </div>

                        <p style="font-size: 12px; position: absolute; bottom: 0;">
                            <a style="text-decoration: none; color: #3d3d3d" href="">&copy; Daniel Pereira Sanches

                            </a>
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<script src="<?=BASE_URL . '/js/account/login.js'?>"></script>