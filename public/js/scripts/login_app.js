
const { createApp, ref } = Vue;

const app = createApp ({
    setup() {
        const email = ref();
        const show_password = ref(false);

        const validate_email = () => {

        };

        const toggle_password = (event) => {
            event.preventDefault();
            show_password.value = !show_password.value;
        };

        return {
            // variables
            email,
            show_password,
            // functions
            toggle_password,
            validate_email,
        }

    }
});

app.mount('#login_app');