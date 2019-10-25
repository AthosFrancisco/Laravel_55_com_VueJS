<template>
    <div :class="'col-sm-'+ (sm || 6)+ ' col-md-' + (md || 4)">
        <div class="thumbnail">
            <img v-bind:src="imagem"
                alt="img">
            <div class="caption">
                <small>{{ data }} - {{ autor }}</small>
                <h3>{{ titulo }}</h3>
                <p>{{ descricao }}</p>
                <p><a v-bind:href="link" class="btn btn-primary" role="button">Leia mais</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo','descricao','link','imagem','data','autor','sm','dm'],
    }
</script>
