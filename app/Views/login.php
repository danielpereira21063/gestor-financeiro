
<section class="sectionPrincipal">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-8">
                <form method="POST" action="postLogin">
                    <div class="divLogin" id="divLogin">
                        <div class="cardLogin">
                            <h4>
                                Entrar no sistema
                                <br>
                                <br>
                            </h4>
                    
                            <?php if(isset($_SESSION['loginErrado'])): ?>
                            <h4 style="color: #ff5a5a;">
                                Acesso negado!
                            </h4>
                            <?php endif; ?>
                            <div class="grupoInput">
                                <label></label>
                                <br>
                                <i class="bi bi-person-circle"></i>
                                <input class="<?=isset($_SESSION['loginErrado']) ? 'acessoNegado' : '';?>" name="usuario" type="text" value="<?= isset($_SESSION['loginBackup']) ? $_SESSION['loginBackup'] : ''?>" placeholder="Nome de usuário">
                            </div>
                            <div class="grupoInput">
                                <label></label>
                                <br>
                                <i class="bi bi-shield-lock-fill"></i>
                                <input class="<?=isset($_SESSION['loginErrado']) ? 'acessoNegado' : '';?>" name="senha" type="password" placeholder="Senha">
                            </div>
    
                            <button type="submit" class="btnEntrar">Entrar</button>
    
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
                </form>
            </div>
        </div>
    </div>
</section>

<?php if(isset($_SESSION['loginErrado'])) unset($_SESSION['loginErrado']) ?>
<script src="<?=BASE_URL . '/js/account/login.js'?>"></script>