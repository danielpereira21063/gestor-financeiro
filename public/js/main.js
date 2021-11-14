const gestor = {
    data() {
        return {
            dados: {
                categoria: '',
                valor: 0,
                descricao: '',
                gastando: false
            }
        }
    },

    methods: {
        salvar() {
            let confirmarMovimento = false;
            confirmarMovimento = confirm("Confirmar movimento? ");

            if(confirmarMovimento) {
                var thisVue = this;
                $.ajax({
                    type: 'POST',
                    data: thisVue.dados,
                    url: 'http://127.0.0.1/GestorDeSaldo/gestor/salvar',
                    success: (resp) => {
                        resp = JSON.parse(resp);
                        if(resp == "vazio") {
                            alert('Existem campos vazios');
                            return;
                        }
                        if(resp == 1) {
                            alert('Salvo com successo');
                        } else {
                            alert(resp);
                        }
                        console.log(resp);
                    }
                });
                return;
            }

            alert("Movimento cancelado");
        },
    },

    watch: {
        'dados.categoria': function(val) {
            if(val != 'ADICIONADO') {
                this.dados.gastando = false
            } else {
                this.dados.gastando = true;   
            }
        }
    }
}

const app = Vue.createApp(gestor);
app.mount('#principal');