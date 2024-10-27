
const { createApp, ref } = Vue;

const app = createApp ({
    setup() {
        const show_password = ref(false);
        const show_password_confirmation = ref(false);

        const toggle_password = (event) => {
            event.preventDefault();
            show_password.value = !show_password.value;
        };

        const toggle_password_confirmation = (event) => {
            event.preventDefault();
            show_password_confirmation.value = !show_password_confirmation.value;
        };

        return {
            // variable
            show_password,
            show_password_confirmation,
            // functions
            toggle_password,
            toggle_password_confirmation,
        }

    }
});

app.mount('#register_app');