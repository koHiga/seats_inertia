<template>
  <app-layout>
    <Head title="Booking Seats -Welcome" />

    
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Header from "../Layouts/Header.vue";
import Footer from "../Layouts/Footer.vue";

export default defineComponent({
  //props: ["request", "seat"],

  components: {
    Head,
    AppLayout,
    Header,
    Footer,
  },

  data() {
    return {
    };
  },

  methods: {},
});
</script>