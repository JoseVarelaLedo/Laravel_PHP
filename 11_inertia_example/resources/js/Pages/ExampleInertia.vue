<template>
    <div class="container">
        <h1 class="head_title"><em>Hi from the Example Component!</em></h1>
        <h1> {{ counter }}</h1>
        <button @click="increase" class="btn_increase"> Increase </button>
        <NavLink :href="route('login')">Login</NavLink>
    </div>
</template>

<script setup>
    //import "bootstrap/dist/css/bootstrap.min.css";
    import NavLink from '@/Components/NavLink.vue';
    import {ref} from 'vue';
    const counter = ref(0);
    const increase = () =>
    counter.value++;
</script>

<style scoped>
    .container{
        border-style: dotted;
        position:relative;
        text-align: center;

    }
    .head_title{
        width: fit-content;
        font-family: cursive;
        font-weight: bold;
        background-color: cyan;
        color:brown;
    }
    .btn_increase{
        color: darkblue;
        background-color: beige;
        border: 2px;
        border-color: chocolate;
        border-radius: 2px;
    }
</style>
