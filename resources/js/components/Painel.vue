<template>
    <div>
        <div class="content-box">
            <h3 class="content-box-header bg-default text-center">
                {{ titulo }}
            </h3>
            <div class="content-box-wrapper">
                <slot></slot>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['titulo']
    }
</script>
