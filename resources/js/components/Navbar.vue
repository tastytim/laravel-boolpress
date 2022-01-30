<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link class="nav-brand" to="/"> Home </router-link>

                <v-btn
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </v-btn>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- IF NOT LOGGED -->
                    <ul
                        class="navbar-nav d-flex mr-auto mb-2 mb-lg-0"
                        v-if="!$userName"
                    >
                        <li class="nav-item">
                            <router-link class="nav-link" to="/register">
                                Register
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login">
                                Login
                            </router-link>
                        </li>
                    </ul>
                    <!-- IF LOGGED -->
                    <ul class="navbar-nav d-flex mr-auto mb-2 mb-lg-0" v-else>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/admin/posts">
                                My Posts
                            </router-link>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex ml-auto mb-2 mb-lg-0" v-if="$userName">
                        <li class="nav-item-dropdown">
                            <router-link
                                class="nav-link dropdown-toggle"
                                to="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ $userName }}
                            </router-link>
                            <div
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                            >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @onclick="
                                        event.preventDefault();
                                        document
                                            .getElementById('logout-form')
                                            .submit();
                                    "
                                >
                                    Logout
                                </a>
                                <form
                                    id="logout-form"
                                    action="logout"
                                    method="POST"
                                    class="d-none"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        :value="this.$csrf_token"
                                    />
                                </form>

                                <router-link class="dropdown-item" to="/admin">
                                    Admin Profile
                                </router-link>
                                <router-link
                                    class="dropdown-item"
                                    to="/admin/posts"
                                >
                                    My Posts
                                </router-link>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {
        submit: function () {
            this.$refs.form.submit();
        },
    },

    mounted() {
        console.log(this.$userName);
        console.log(this.$csrf_token);
    },
};
</script>

<style></style>
