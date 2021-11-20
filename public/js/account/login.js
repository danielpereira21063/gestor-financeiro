const appLogin = {
    data() {
        return {
            dados: {
                usuario: '',
                senha: ''
            }
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
                }
            });
        },
    }
}

Vue.createApp(appLogin).mount('#divLogin');