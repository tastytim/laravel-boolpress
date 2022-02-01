<template>
    <div class="container" >
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 py-5 px-5 rounded">
                <h2 class="text-center" collor="primary">Contatta</h2>
                <v-app class="p-5" color:secondary text:white>
                    <v-alert v-if="submitted" type="success"> La mail è stata spedita. </v-alert>
                    <v-form v-else ref="form" v-model="valid" lazy-validation @submit.prevent="onSubmit">
                        <v-text-field
                            v-model="form.nome"
                            :counter="2"
                            :rules="nameRules"
                            label="Nome"
                            required
                        ></v-text-field>
                        <v-text-field
                            v-model="form.cognome"
                            :counter="2"
                            :rules="cognomeRules"
                            label="Cognome"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="form.email"
                            :rules="emailRules"
                            label="E-mail"
                            required
                        ></v-text-field>

                        <v-textarea
                            v-model="form.formtext"
                           
                            :rules="[(v) => !!v || 'Inserisci il testo']"
                            label="Testo"
                            required
                        ></v-textarea>

                        <v-checkbox
                            v-model="checkbox"
                            :rules="[
                                (v) => !!v || 'Accettare per poter spedire',
                            ]"
                            label="Accetta"
                            required
                        ></v-checkbox>

                        <v-btn
                            :disabled="!valid"
                            color="success"
                            class="mr-4"
                            @click="validate"
                        >
                            Spedire
                        </v-btn>

                        <v-btn color="error" class="mr-4" @click="reset">
                            Resetta tutto
                        </v-btn>
                    </v-form>
                </v-app>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        valid: true,
        form:{
            nome: "",
        cognome: "",
        formtext:"",
        email: "",
        },
        
        nameRules: [
            (v) => !!v || "Nome richiesto",
            (v) => (v && v.length <= 10) || "Nome non puo essere campo vuoto",
        ],
        cognomeRules: [
            (v) => !!v || "Cognome richiesto",
            (v) => (v && v.length <= 10) || "Cognome non puo essere campo vuoto",
        ],
        
        emailRules: [
            (v) => !!v || "E-mail richiesto",
            (v) => /.+@.+\..+/.test(v) || "E-mail deve essere valido",
        ],
        
        checkbox: false,
        submitted: false,
    }),

    methods: {
        validate() {
            
            this.onSubmit();
            
        },
        reset() {
            this.$refs.form.reset();
        },
        onSubmit(){
            window.axios.post('/api/contacts', this.form).then((resp)=>{
                this.submitted = true;
            });  
        }
    },
};
</script>

<style></style>
