<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link class="nav-brand" to="/"> Home </router-link>
                <router-link class="mx-2 nav-item" to="/contact"> Contact </router-link>

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
                        class="navbar-nav d-flex ml-auto mb-2 mb-lg-0"
                        v-if="!$userName"
                    >
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                Login
                            </a>
                        </li>
                    </ul>
                    <!-- IF LOGGED -->
                    <ul class="navbar-nav d-flex mr-auto mb-2 mb-lg-0" v-else>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/posts">
                                My Posts
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex ml-auto mb-2 mb-lg-0" v-if="$userName">
                        <li class="nav-item-dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ $userName }}
                            </a>
                            <div
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                            >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @click.prevent="logout"
                                >
                                    Logout
                                </a>
                                

                                <a class="dropdown-item" href="/admin">
                                    Admin Profile
                                </a>
                                <a
                                    class="dropdown-item"
                                    href="/admin/posts"
                                >
                                    My Posts
                                </a>
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
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    },
    methods: {
            logout:function(){
               axios.post('logout').then(response => {
                  if (response.status === 302 || 401) {
                    console.log('logout')
                  }
                  else {
                    // throw error and go to catch block
                  }
                }).catch(error => {

              });
            }
        
    },

    mounted() {
        console.log(this.$userName);
        console.log(this.$csrf_token);
    },
    
};
</script>

<style></style>
