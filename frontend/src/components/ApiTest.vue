<script>
export default {
  data: () => ({
    apiResponse: null,
    apiWeatherResponse: null,
  }),

  created() {
    this.fetchData();
  },

  methods: {
    async fetchData() {
      const url = "http://localhost/";
      this.apiResponse = await (await fetch(url)).json();
    },
    async fetchWeatherData(latitude, longitude) {
      const url = `http://localhost/web/${latitude}/${longitude}`;
      this.apiWeatherResponse = await (await fetch(url)).json();
      console.log(this.apiWeatherResponse);
    },
    getData(item) {
      this.fetchWeatherData(
        item.latitude.slice(0, -4),
        item.longitude.slice(0, -4)
      );
    },
  },
};
</script>

<template>
  <div class="sm:px-6 lg:px-8" v-if="!apiResponse">Pinging the api...</div>

  <div v-if="apiResponse">
    <p class="sm:px-6 lg:px-8">The api responded with:</p>
    <br />
    <div class="conatiner mx-5">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table
              class="min-w-full text-center text-sm font-light border border-slate-400"
            >
              <thead
                class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900"
              >
                <tr>
                  <th scope="col" class="px-6 py-4">Name</th>
                  <th scope="col" class="px-6 py-4">Email</th>
                  <th scope="col" class="px-6 py-4">Latitude</th>
                  <th scope="col" class="px-6 py-4">Longitude</th>
                  <th scope="col" class="px-6 py-4"></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="border-b dark:border-neutral-500 even:bg-blue-100 odd:bg-gray-100 hover:bg-sky-300"
                  v-for="item in apiResponse.users"
                >
                  <td class="whitespace-nowrap px-6 py-4 font-medium">
                    {{ item.name }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">{{ item.email }}</td>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ item.latitude }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ item.longitude }}
                  </td>
                  <td>
                    <button
                      v-on:click="getData(item)"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                    >
                      Get Data
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div v-if="apiWeatherResponse">
        <div v-if="apiWeatherResponse.current">
          <table
            class="min-w-full text-center text-sm font-light border border-slate-400"
          >
            <thead
              class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900"
            >
              <tr>
                <th scope="col" class="px-6 py-4">Temperature in C</th>
                <th scope="col" class="px-6 py-4">Temperature in F</th>
                <th scope="col" class="px-6 py-4">Wind in KpH</th>
                <th scope="col" class="px-6 py-4">Feels like</th>
                <th scope="col" class="px-6 py-4">Humidity</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="border-b dark:border-neutral-500 even:bg-blue-100 odd:bg-gray-100 font-medium"
              >
                <td class="whitespace-nowrap px-6 py-4">
                  {{ apiWeatherResponse.current.temp_c }}
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                  {{ apiWeatherResponse.current.temp_f }}
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                  {{ apiWeatherResponse.current.wind_kph }}
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                  {{ apiWeatherResponse.current.feelslike_c }}
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                  {{ apiWeatherResponse.current.humidity }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div
          v-if="apiWeatherResponse.error"
          class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 font-medium"
        >
          <div>{{ apiWeatherResponse.error.message }}</div>
        </div>
      </div>
    </div>
  </div>
</template>
