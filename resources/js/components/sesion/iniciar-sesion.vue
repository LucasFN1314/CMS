<template>
    <div>
        <div class="form-container">
            <div class="form-content">
                <h3>Inicio de sesion</h3>

                <form class="form">

                    <div class="mb-3 inp">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" v-model="user" name="text" class="form-control" id="Email"
                            placeholder="name@example.com">
                    </div>
                    
                    <div class="mb-3 inp">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" v-model="password" name="password" class="form-control" id="password"
                            placeholder="">
                    </div>

                    <button v-on:click="login()" type="button" class="btn btn-in btn-outline-dark">Ingresar</button>
                    <a href="#">Recuperar contraseña</a>
                    <a href="/registrarse">Registrarse</a>
                </form>
            </div>
        </div>

        <notification ref="notification"></notification>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    mounted() {
        this.csrf = document.getElementById('csrf').value;
    },
    data() {
        return {
            user: '',
            password: '',
            csrf: ''
        }
    },
    methods: {
        login() {

            axios.post('/login', 
            { 
                _token: this.csrf,
                email: this.user, 
                password: this.password 
            }).then((response) => {
                if (response.data.msg == "200") {
                    location.href = '/';
                }
                else {
                    // Show message
                    this.$refs.notification.open('Error', response.data.msg, 'Aceptar');
                }
            });
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

.form-container {
    width: 100%;
    height: calc(100vh - 5.4em);


    display: flex;
    align-items: center;
    justify-content: center;
    animation: appear;
    animation-duration: 2s;

}

.form-content {
    width: 30%;
    height: 90%;

    background: #202030;
    border-radius: 1%;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);

    padding-bottom: 9em;
    z-index: 1;
}

.form {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;
    color: white;

}

.form-content>h3 {
    text-align: center;
    color: white;
    margin-top: 1em;
    margin-bottom: 1.5em;
    font-weight: 100;
    font-family: 'Ubuntu', sans-serif;
}

.inp {
    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    margin-bottom: 1em;

    width: 80%;
    text-align: center;

    font-family: 'Ubuntu', sans-serif;

}

.inp>input {
    outline: none;
    background-color: transparent;
    border-color: transparent;

    padding-bottom: 1em;

    color:white;
    caret-color: white;
    border-bottom: 1px solid white;
}

.inp>input:focus {
    outline: none;
    background-color: transparent;
    border-color: transparent;
    box-shadow: none !important;
    border-bottom: 1px solid white;
}

input,
label {
    width: 100%;
    text-align: left;
}

label {
    padding: .5em;
}

input {
    height: 2em;
}

.form>button {
    margin-top: 1em;
    margin-bottom: 4em;

    padding: .5em;
    transition:.3s;
}

.form>button:hover {
    color:black;
    background:rgba(255, 255, 255, 0.774);
}

.form>a {
    color: white;
    margin-bottom: .5em;

    text-decoration: none;
    font-family: 'Ubuntu', sans-serif;

}
.btn-in {
    color: white;
}

@keyframes appear {
    0% {
        opacity: 0%;
    }

    100% {
        opacity: 100%;
    }
}
</style>