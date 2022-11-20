<template>
  <div v-if="show" class="notification-container">
    <div class="notification">
        <div class="notification-content">
            <h3>{{title}}</h3>
            <p>{{desc}}</p>
            <button v-if="action != ''" type="button" class="btn btn-outline-secondary" v-on:click="goTo()">{{button}}</button>
            <button v-if="action == ''" type="button" class="btn btn-outline-secondary" v-on:click="hide()">{{button}}</button>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            title: 'Titulo',
            desc: 'Descripción',
            button: 'Aceptar',
            action: ''
        }
    },
    methods: {
        open(title, desc, button) {
            this.title = title;
            this.desc = desc;
            this.button = button;
            this.show = true;
        },
        hide() {
            this.show = false;
        },
        setAction(action) {
            this.action = action;
        },
        goTo() {
            location.href = this.action;
        }
    },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

.notification-container {
    width: 100%;
    height: 100vh;

    position: absolute;
    top: 0;
    left: 0;


    display: flex;
    align-items: center;
    justify-content: center;
}
.notification {
    color:white;
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
    
    width: 40%;
    height: fit-content;
    background: #0e0e18;
    
    z-index: 100;
    border-radius: 1em;
    box-shadow: 0px 0px 5px black;
}

.notification-content {
    height: fit-content;
    padding: 1em;
}

.notification-content>h3 {
}

.notification-content>p {
    padding: .5em;
}

.notification-content>button {
    padding: .3em .4em;
    color: white;
}
.notification-content>button:hover {
    color: black;
    background:rgba(255, 255, 255, 0.774);    
}


</style>