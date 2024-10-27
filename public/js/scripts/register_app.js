
const { createApp, ref } = Vue;

const app = createApp ({
    setup() {
        const show_password = ref(false);
        const show_confirm_password = ref(false);

        const toggle_password = (event) => {
            event.preventDefault();
            show_password.value = !show_password.value;
        };

        const toggle_confirm_password = (event) => {
            event.preventDefault();
            show_confirm_password.value = !show_confirm_password.value;
        };

        return {
            // variable
            show_password,
            show_confirm_password,
            // functions
            toggle_password,
            toggle_confirm_password,
        }

    }
});

app.mount('#register_app');