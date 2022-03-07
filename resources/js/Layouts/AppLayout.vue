<template>
    <!-- Page Heading -->
    <Header></Header>

    <!-- Page Content -->
    <section class="main-section">
        <div class="container">
            <slot></slot>
            
        </div>
    </section>

            <!-- Page Footer -->
    <Footer></Footer>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Header from './Header.vue'
    import Footer from './Footer.vue'

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            Link,
            Header,
            Footer,
        },

        data() {
            return {
                
            }
        },

        methods: {
            
        }
    })
</script>
