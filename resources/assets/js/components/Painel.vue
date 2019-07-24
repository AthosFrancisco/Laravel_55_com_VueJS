<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading">{{ titulo }}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'cor'],
        computed: {
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        },
    }
</script>

<style media="screen">
    .blue {
        border-color: #d6e9c6;
    }

    .blue > .panel-heading {
        color: #000000;
        background-color: #1061a2;
        border-color: #1061a2;
    }
</style>
