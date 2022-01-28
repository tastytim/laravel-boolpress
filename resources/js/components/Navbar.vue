<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link class="nav-link px-lg-3 py-3 py-lg-4" to="/">
                    Home
                </router-link>
                <router-link class="nav-link px-lg-3 py-3 py-lg-4" to="/about">
                    About
                </router-link>
                <router-link
                    class="nav-link px-lg-3 py-3 py-lg-4"
                    to="/contact"
                >
                    Contact
                </router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav d-flex me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link px-lg-3 py-3 py-lg-4"
                                href="/login"
                            >
                                <!-- {{ user.name ? user.name : "Login" }} -->
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            user: {
                type: Object,
                required: true,
            },
        };
    },
    mounted() {
        // window.axios.get("/api/user").then((resp) => {
        //     console.log(resp.data);
        //     this.user = resp.data;
        // });
    },
};
</script>

<style></style>
