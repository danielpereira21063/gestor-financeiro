const appLogin = {
    data() {
        return {
            dados: {
                usuario: '',
                senha: ''
            },
            acessoNegado: false
        }
    },

    methods: {
        fazerLogin() {
            var thisVue = this;
            $.ajax({
                type: 'POST',
                data: thisVue.dados,
                url: '/gestor-financeiro/Account/postLogin',
                success: (resp) => {
                    console.log(resp);
                    if(resp != "200") {
                        thisVue.acessoNegado = true;
                    }
                }
            });
        },
    }
}

Vue.createApp(appLogin).mount('#divLogin');