const appIndex = {
    data() {
        return {
            movimentosUser: [],
            ultimoMovimento: {},
            receitaMes: {},
        }
    },

    methods: {
        getDadosUser() {
            var thisVue = this;
            $.ajax({
                type: 'get',
                url: '/gestor-financeiro/Main/getDadosUsuario',
                success: function (resp) {
                    thisVue.movimentosUser = JSON.parse(resp);
                    var len = thisVue.movimentosUser.length;

                    thisVue.ultimoMovimento = thisVue.movimentosUser.find((mov) =>
                        mov.id_movimento == len //pega o último movimento
                    )

                    console.log(thisVue.ultimoMovimento);
                }
            });
        }
    },

    created() {
        this.getDadosUser();
    }

}

Vue.createApp(appIndex).mount('#index');