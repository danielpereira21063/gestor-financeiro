const appLogin = {
    data() {
        return {
            dados: {
                email
            }
        }
    },

    methods: {
        login() {
            var thisVue = this;
            $.ajax({
                type: 'POST',
                data: thisVue.dados,
                url: 'http://127.0.0.1/gestor-finananceiro/account/postLogin',
                success: (resp) => {
                    resp = JSON.parse(resp);
                    if (resp == "vazio") {
                        alert('Existem campos vazios');
                        return;
                    }
                    if (resp == 1) {
                        alert('Salvo com successo');
                    } else {
                        alert(resp);
                    }
                    console.log(resp);
                }
            });
            alert("Movimento cancelado");
        },
    },

    watch: {
        'dados.categoria': function (val) {
            if (val != 'ADICIONADO') {
                this.dados.gastando = false
            } else {
                this.dados.gastando = true;
            }
        }
    }
}

const app = Vue.createApp(appLogin);
app.mount('#divLogin');