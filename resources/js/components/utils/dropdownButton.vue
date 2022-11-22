<template>
    <li class="li" v-on:mouseenter="show = true" v-on:mouseleave="show = true;">
        <a href="">
            {{this.text}}
        </a>

        <ul class="submenu" v-if="show">
            <li class="list">
                <a v-for="(item, index) in list" :key="index" :href="item.link" v-on:click="action(item.action)">{{item.text}}</a>
            </li>
        </ul>
    </li>
</template>
<script>
export default {
    data() {
        return {
            show: false,
        }   
    },
    methods: {
        action(action) {
            if(action) {
                axios.post(action).then((response) => {
                    let resp = response.data;
                    if(resp.action) {
                        eval(resp.action);
                    }
                });
            }
        }
    },
    mounted(){
    },
    props: [
        'href',
        'text',
        'list',
    ],
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

.li {
    position: relative;
}

.li a {
    
    text-decoration: none;
    color:rgb(190, 190, 190);
}

.submenu {
    font-family: 'Roboto', sans-serif;

    margin: 0;
    padding: 0;
    position: absolute;

    top: 100%;
    left: 0;
    list-style: none;

    background-color: #202030;
    width: fit-content;
    animation: openSubmenu;
    animation-duration: .2s;

}

.submenu li a {
    display: block;
    padding: .5em;
    text-decoration: none;
    color:rgb(190, 190, 190);

    white-space: nowrap;
}

.submenu li a:hover {
    cursor: pointer;

    transition: .2s;
    color:rgb(190, 190, 190);

    background-color: rgba(255, 255, 255, 0.100);
}

@keyframes openSubmenu {
    0% {
        opacity: 0%;
    }

    100% {
        opacity: 100%;
    }
}

</style>