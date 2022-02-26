<template>
    <Head title="Welcome" />

    <section>
        <h1>Hello Inertia!</h1>
    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
        },

        props: {
            
        }
    })
</script>
