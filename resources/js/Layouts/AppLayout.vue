<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <Header></Header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>

            <!-- Page Footer -->
            <Footer></Footer>
        </div>
    </div>
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
