<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header>
    <div
      class="mb-4 text-4xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center my-8"
    >
      <nav>
        <RouterLink to="/">Weather Api</RouterLink>
      </nav>
    </div>
  </header>
  <RouterView />
</template>

<style scoped></style>
