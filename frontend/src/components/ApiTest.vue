<script>
export default {
  data: () => ({
    apiResponse: null,
  }),

  created() {
    this.fetchData();
  },

  methods: {
    async fetchData() {
      const url = "http://localhost/";
      this.apiResponse = await (await fetch(url)).json();
    },
  },
};
</script>

<template>
  <div class="bg-red-600">Hola</div>
  <div class="bg-red-600">Hola</div>
  <div v-if="!apiResponse">Pinging the api...</div>

  <div v-if="apiResponse">
    The api responded with: <br />
    <code>
      {{ apiResponse }}
    </code>
  </div>
</template>
