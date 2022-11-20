<template>
  <div>
    <div class="form-container">
      <form action="">
        <h3>Registrarse</h3>

        <div class="form-content">
          <div class="mb-3 inp">
            <label for="Email" class="form-label">Email</label>
            <input
              type="email"
              v-model="email"
              name="text"
              class="form-control"
              id="Email"
              placeholder="name@example.com"
            />
          </div>
          <div class="mb-3 inp">
            <label for="Email" class="form-label">Nombre y apellido</label>
            <input
              type="text"
              v-model="nyp"
              name="nyp"
              class="form-control"
              id="nyp"
              placeholder="JUAN MORALES"
            />
          </div>
          <div class="mb-3 inp">
            <label for="password" class="form-label">Contraseña</label>
            <input
              type="password"
              v-model="password"
              name="password"
              class="form-control"
              id="password"
              placeholder=""
            />
          </div>
          <div class="mb-3 inp">
            <label for="password2" class="form-label"
              >Verifique su contraseña</label
            >
            <input
              type="password"
              v-model="password2"
              name="password2"
              class="form-control"
              id="password2"
              placeholder=""
            />
          </div>

          <button
            type="button"
            class="btn btn-in btn-outline-dark"
            v-on:click="register()"
          >
            Registrarse
          </button>
        </div>
      </form>
    <notification ref="notification"></notification>

    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {},
  data() {
    return {
      nyp: "",
      email: "",
      password: "",
      password2: "",
    };
  },
  methods: {
    register() {
      axios
        .post("/register", {
          nyp: this.nyp,
          email: this.email,
          password: this.password,
          password2: this.password2,
        })
        .then((response) => {
            if(response.data.status == 'OK') {
                this.$refs.notification.open('Ok', response.data.msg, 'Aceptar');
                if(response.data.action) {
                    this.$refs.notification.setAction(response.data.action);
                }
            }
            else {
                this.$refs.notification.open('Error', response.data.msg, 'Aceptar');
            }
        });
    },
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Ubuntu&display=swap");

h3 {
  text-align: center;
  color: white;
  margin-top: 1em;
  margin-bottom: 1em;
  font-weight: 100;
  font-family: "Ubuntu", sans-serif;
}

.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  margin-top: 2em;
  animation: appear;
  animation-duration: 2s;
}

form {
  width: 40%;

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  color: white;
  font-family: "Ubuntu", sans-serif;

  background: #202030;

  padding: 1em;
}

.form-content {
  width: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.inp {
  display: flex;
  flex-direction: column;

  align-items: center;
  justify-content: center;

  margin-bottom: 1em;

  width: 100%;
  text-align: center;

  font-family: "Ubuntu", sans-serif;
}

.inp > input {
  outline: none;
  background-color: transparent;
  border-color: transparent;

  padding-bottom: 1em;

  color: white;
  caret-color: white;
  border-bottom: 1px solid white;
}

.inp > input:focus {
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
  padding: 0.5em;
}

input {
  height: 2em;
}

.btn-in {
  color: white;

  padding: 0.6em;
  margin-top: 1em;
  margin-bottom: 1em;
}
.btn-in:hover {
  color: black;
  background: rgba(255, 255, 255, 0.774);
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