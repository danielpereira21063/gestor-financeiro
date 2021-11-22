
<section class="sectionPrincipal">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-8">

                <div class="divLogin" id="divLogin">
                    <div class="cardLogin">
                        <h4 class="position-absolute" style="top: 10px;font-size: 30px;" v-show="!acessoNegado">
                            Entrar no sistema
                        </h4>
                
                        <h4 class="position-absolute textNegado" style="color: #ff5a5a;" v-if="acessoNegado">
                            Acesso negado!
</h4  >
                        <br>
                        <br>
                        <br>
                        <div class="grupoInput">
                            <label></label>
                            <br>
                            <i class="bi bi-person-circle"></i>
                            <input v-bind:class="{'acessoNegado': acessoNegado}" v-model="dados.usuario" type="text" placeholder="Nome de usuário">
                        </div>
                        <div class="grupoInput">
                            <label></label>
                            <br>
                            <i class="bi bi-shield-lock-fill"></i>
                            <input v-bind:class="{'acessoNegado': acessoNegado}" v-model="dados.senha" type="text" placeholder="Senha">
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