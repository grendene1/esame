<template>
  <div class="w-full max-w-screen-md mx-auto pt-8">
    <div class="flex items-center mb-5">

    </div>
    <div class="grid grid-cols-3 gap-x-5 gap-y-5">
      <div
        class="bg-gray-200 rounded flex flex-col p-3"
        v-for="farmland in farmlands"
        :key="farmland.id"
      >
        <div
          class="h-56 w-full bg-white cursor-pointer"
          @click="goToDetail(farmland)"
        >
          <img class="w-full h-full" :src="farmland.photo" alt="" />
        </div>
        <div class="flex flex-row items-center pt-3">
          <div class="flex-grow">
            {{ farmland.city }}
          </div>
          <div class="flex">
            <h2 class="ml-auto text-green-600 font-bold text-xl">
              {{ farmland.rental }} €
            </h2>
          </div>
        </div>
        <div class="mt-3 ml-auto space-x-3">
          <button
            class="text-yellow-600 text-sm font-bold"
            @click="edit(farmland)"
          >
            Modifica
          </button>
          <button
            class="text-red-600 text-sm font-bold"
            @click="deleteFarmland(farmland)"
          >
            Elimina
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      farmlands: []
    };
  },
  async mounted() {
    await this.getFarmlands();
  },
  methods: {
    async getFarmlands() {
      let response = await axios.get(
        "http://localhost:8000/api/farmlands"
      );
      this.farmlands = response.data;
      console.log(this.farmlands);
    },
    edit(farmland) {
      this.$router.push("/edit/" + farmland.id);
    },
    goToDetail(farmland) {
      this.$router.push("/view/" + farmland.id);
    },
    async deleteFarmland(farmland) {
      if (
        confirm(
          "Vuoi davvero eliminare l'annuncio: " + farmland.name + "?",
          "Si",
          "No"
        )
      ) {
        await axios.delete("http://localhost:8000/api/farmlands/" + farmland.id);
        await this.getFarmlands();
      }
    },
  }   
}
</script>
