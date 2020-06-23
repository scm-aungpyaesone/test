export default {
    data: () => ({
        valid: true,
        user: {
            email: "",
            password: "",
        },
        email: "",
        password: "",
        error: "",
        errors: {
            email: "",
            password: "",
            others: ""
        },

        // validation rules for user email.
        emailRules: [
            value => !!value || "The email field is required.",
            value => /.+@.+\..+/.test(value) || "E-mail must be valid."
        ],

        // validation rules for password.
        pwdRules: [value => !!value || "The password field is required."]
    }),
    methods: {
        /**
         * This to submit login form.
         * @returns void
         */
        login() {
            this.$store
                .dispatch("login", {
                    email: this.email,
                    password: this.password
                })
                .then(() => {
                    this.error = "";
                    this.$router.push({ name: "home" });
                })
                .catch(err => {
                    this.error = err.response.data.errors.message;
                    console.log(err);
                });
        },
        onSubmit() {
            this.$store
                .dispatch("login", {
                    email: this.user.email,
                    password: this.user.password
                })
                .then(() => {
                    this.error = "";
                    this.$router.push({ name: "home" });
                })
                .catch(err => {
                    err.response.data.errors.email ?
                        this.errors.email = err.response.data.errors.email[0] :
                        this.errors.email = '';
                    err.response.data.errors.password ?
                        this.errors.password = err.response.data.errors.password[0] :
                        this.errors.password = '';
                    err.response.data.errors.others ?
                        this.errors.others = err.response.data.errors.others[0] :
                        this.errors.others = '';
                });
        }
    }
};
