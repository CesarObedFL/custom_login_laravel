
const { createApp, ref, computed } = Vue;

const app = createApp ({
    setup() {

        const users = ref([]);

        // table dinamic filters
        const search_query = ref('');
        const sort_column = ref(null);
        const sort_direction = ref(1); // 1: ascendente, -1: descendente

        const id = ref();
        const name = ref();
        const email = ref();
        const phone = ref();
        const rfc = ref();
        const notes = ref();

        const get_all_users = async () => {
            await axios.get(`http://localhost:8070/get_all_users`)
            .then(response => {
                response.data.map(function(value, key) {
                    users.value.push({ 
                        id: value.id,
                        name: value.name,
                        email: value.email,
                        phone: value.phone,
                        rfc: value.rfc,
                        notes: value.notes,
                    });
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error.message,
                });
            });
       };

        const get_user_by_id = async (user_id) => {
            await axios.get(`http://localhost:8070/user/${user_id}`)
            .then(response => {
                let user = JSON.parse(JSON.stringify(response.data.user));
                id.value = user.id;
                name.value = user.name;
                email.value = user.email;
                phone.value = user.phone;
                rfc.value = user.rfc;
                notes.value = user.notes;
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error.message,
                });
            });
        };

        const update_user = (user_id) => {

            const user = {
                id: id.value,
                name: name.value,
                email: email.value,
                phone: phone.value,
                rfc: rfc.value,
                notes: notes.value,
            };

            axios.put(`http://localhost:8070/user/update/${user_id}`, user)
            .then(response => {
                Swal.fire({
                    title: "Success!",
                    text: response.data.message,
                    icon: "success",
                    timer: 2000,
                })
                .then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error.message,
                });
            });
        };

        const delete_user = (user_id) => {
            axios.delete(`http://localhost:8070/user/delete/${user_id}`)
            .then(response => {
                Swal.fire({
                    title: "Success!",
                    text: response.data.message,
                    icon: "success",
                    timer: 2000,
                })
                .then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error.message,
                });
            });
        };


        // Computed apply for search and sort
        const filtered_users = computed(() => {
            let result = users.value;

            // filter the users 
            if (search_query.value) {
                result = result.filter(user =>
                    user.name.toLowerCase().includes(search_query.value.toLowerCase()) ||
                    user.email.toLowerCase().includes(search_query.value.toLowerCase())
                );
            }

            // if a column is specified, sort the users
            if (sort_column.value) {
                result = result.slice().sort((a, b) => {
                    if (a[sort_column.value] > b[sort_column.value]) return sort_direction.value;
                    if (a[sort_column.value] < b[sort_column.value]) return -sort_direction.value;
                    return 0;
                });
            }

            return result;
        });

        // change the sort criteria
        const sort_by = (column) => {
            if (sort_column.value === column) {
                // from z to a
                sort_direction.value *= -1;
            } else {
                // from a to z
                sort_column.value = column;
                sort_direction.value = 1;
            }
        };

        get_all_users();

        return {
            // variables
            users,
            id,
            name,
            email,
            phone,
            rfc,
            notes,

            search_query,
            sort_direction,
            sort_column,
            filtered_users,
            // functions
            get_user_by_id,
            update_user,
            delete_user,
            sort_by,
        }

    }
});

app.mount('#index_users_app');