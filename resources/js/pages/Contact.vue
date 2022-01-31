<template>
    <div class="container py-5 px-5 rounded">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h2>Contatta</h2>
                <v-app>
                    <v-form ref="form" v-model="valid" lazy-validation>
                        <v-text-field
                            v-model="name"
                            :counter="2"
                            :rules="nameRules"
                            label="Nome"
                            required
                        ></v-text-field>
                        <v-text-field
                            v-model="cognome"
                            :counter="2"
                            :rules="cognomeRules"
                            label="Cognome"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="email"
                            :rules="emailRules"
                            label="E-mail"
                            required
                        ></v-text-field>

                        <v-textarea
                            v-model="select"
                            :items="items"
                            :rules="[(v) => !!v || 'Inserisci il testo']"
                            label="Testo"
                            required
                        ></v-textarea>

                        <v-checkbox
                            v-model="checkbox"
                            :rules="[
                                (v) => !!v || 'Accettare per poter spedire',
                            ]"
                            label="Do you agree?"
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
        name: "",
        nameRules: [
            (v) => !!v || "Name is required",
            (v) =>
                (v && v.length <= 10) || "Name must be less than 10 characters",
        ],
        email: "",
        emailRules: [
            (v) => !!v || "E-mail is required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        select: null,
        checkbox: false,
    }),

    methods: {
        validate() {
            this.$refs.form.validate();
        },
        reset() {
            this.$refs.form.reset();
        },
    },
};
</script>

<style></style>
