<template>
    <header>
        <div class="container">
            <div class="content">
                <div class="logo">

                </div>

                <div class="header-list">
                    <ul>
                        <li><a href="/">Inicio</a></li>
                        <li v-if="isAdmin()"><a href="#">Panel</a></li>
                        <li v-if="isAdmin()"><a href="#">Sitios</a></li>
                        <li v-if="isLoggedIn() && !isAdmin()"><a href="#">Mi sitio</a></li>
                        <li v-if="isAdmin()"><a href="#">Configuración</a></li>

                        <li v-if="isLoggedIn()"><a href="#">Mi perfil</a></li>
                        <li v-if="!isLoggedIn()"><a href="/iniciar-sesion">Iniciar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import axios from 'axios';
export default {
    mounted() {
        
    },
    methods: {
        isLoggedIn() {
            if(window.auth_user == true) {
                return true;
            }
            return false;
        },
        isAdmin() {
            if(window.auth_admin == true) {
                return true;
            }
            return false;
        }
    }
}
</script>

<style scopped>
a {
    padding-left: .6em; padding-right: .6em;
}

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

* {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
}

header {
    width: 100%;
    height: 5.4em;

    background-color: #151521;
    
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
}
header>.container {
    width: 100%;
    height: 100%;
}

header>.container>.content {
    width: 100%;
    height: 100%;
}

header>.container>.content>.header-list {
    padding:1em;
    height: 100%;

    display: flex;
    justify-content: center;
}

header>.container>.content>.header-list>ul {
    height: 100%;

    display: flex;

    align-items: center;
    justify-content: center;

    list-style: none;
}

header>.container>.content>.header-list>ul>li {
    height: 100%;
    
    text-align: center;
    min-width: 112px;
    
    margin-right: 1em;
    font-size: 20px;

    display: flex;
    align-items: center;
    justify-content: center;
}

header>.container>.content>.header-list>ul>li:hover {
    transition: .2s;
    background-color: rgba(255, 255, 255, 0.100);
}

header>.container>.content>.header-list>ul>li>a {
    text-decoration: none;
    color:rgb(161, 161, 161);

    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

ul {
    padding-left: 0 !important;
}

</style>