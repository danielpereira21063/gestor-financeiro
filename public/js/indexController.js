const appIndex = {
    data() {
        return {
            movimentosUser: [],
            newMovimento: {
                descricao: '',
                categoria: '',
                local: '',
                valor: ''
            },
            movimentoVisualizar: {},
            vendoMovimento: false,
            detalhes: {
                saldoAtual: 0
            }
        }
    },

    methods: {
        getMovimentos() {
            var thisVue = this;
            $.ajax({
                type: 'get',
                url: '/gestor-financeiro/Main/getMovimentos',
                success: function (resp) {
                    thisVue.movimentosUser = JSON.parse(resp);
                }
            });
        },

        getDetalhes() {
            var thisVue = this;
            $.ajax({
                type: "GET",
                url: '/gestor-financeiro/Movimentos/getDetalhes',
                success: function (resp) {
                    thisVue.detalhes = JSON.parse(resp);
                    console.log(thisVue.detalhes);
                }
            });
        },
        saveTransacao() {
            let tudoCerto = true;

            if (this.newMovimento.descricao == '' || this.newMovimento.categoria == '' || this.newMovimento.local == '' || this.newMovimento.valor == '') {
                alert('Preencha todos os campos');
                tudoCerto = false;
                return;
            }

            if (tudoCerto) {
                var thisVue = this;

                console.log(thisVue.newMovimento)

                $.ajax({
                    type: "POST",
                    url: '/gestor-financeiro/Movimentos/saveNewMovimento',
                    data: thisVue.newMovimento,
                    success: function (resp) {
                        if (JSON.parse(resp) == true) {
                            $('#modalTransacao').modal('hide');
                            toastr.success('Adiconado com sucesso!');
                            thisVue.getMovimentos();
                            thisVue.getDetalhes();
                        }
                    }
                })
            }
        },

        verMovimento(movimento) {
            this.movimentoVisualizar = movimento;
            this.vendoMovimento = true;
            $('#modalTransacao').modal('show');
        },

        editarTransacao() {
            var thisVue = this;
            $.ajax({
                type: "POST",
                url: '/gestor-financeiro/Movimentos/editarMovimento',
                data: thisVue.movimentoVisualizar,
                success: function (resp) {
                    console.log(resp);
                }
            });
        },
        removerMovimento(confirm = false) {
            let thisVue = this;
            let id = thisVue.movimentoVisualizar.id_movimento;


            let remover = false;
            if (!confirm) {
                remover = window.confirm("Tem certeza que quer remover " + thisVue.movimentoVisualizar.descricao + '?');
            }

            if (remover) {
                this.removerMovimento(true);
            }

            if (confirm) {
                $.ajax({
                    type: "POST",
                    // data: {
                    //     idMov: id
                    // },
                    url: '/gestor-financeiro/Movimentos/removerMovimento/' + id,
                    success: function (resp) {
                        console.log(resp);

                        if (resp == 1) {
                            toastr.success(thisVue.movimentoVisualizar.descricao + ' foi removido com sucesso')
                            thisVue.getMovimentos();
                            thisVue.getDetalhes();
                        }
                        thisVue.movimentoVisualizar = {};
                    }
                });
            }
        }
    },

    created() {
        this.getMovimentos();
        this.getDetalhes();
    }

}

Vue.createApp(appIndex).mount('#index');