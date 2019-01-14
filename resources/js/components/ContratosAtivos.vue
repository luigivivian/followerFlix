<template>
    <div class="row">
        <div v-for="u in users" class="content-box border-top border-green mrg10L">
            <h3 class="content-box-header clearfix">
                {{u.name}}
                <small class="label-success">PAGO</small>
            </h3>
            <div class="content-box-wrapper">
                <p>luigivivian@gmail.com</p>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['titulo', 'users'],

    }
</script>
