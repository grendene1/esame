<template>
  <div class="w-full max-w-screen-md mx-auto py-8 px-3">
    <div class="flex items-end">
      <h1 class="font-bold text-3xl">{{ farmland.city }}</h1>
      <h2 class="ml-auto text-green-600 font-bold text-2xl">
        {{ farmland.rental }} €
      </h2>
    </div>
    <div class="flex mt-5 items-stretch">
      <div class="h-56 w-56 w-full bg-white cursor-pointer mr-8">
        <img class="w-full h-full" :src="farmland.photo" alt="" />
      </div>
      <div class="flex flex-col justify-between flex-grow">
        <div
          v-for="field in fields"
          :key="field.code"
          class="border-b border-gray-600 flex items-center"
        >
          <span>
            {{ field.label }}
          </span>
          <span class="ml-auto font-bold">
            {{ farmland[field.code] }}
          </span>
          <span class="ml-1" v-if="!!field.filter">
            {{ field.filter }}
          </span>
        </div>
      </div>
    </div>
    <div>
      <button
        @click="goToList()"
        class="text-gray-500 text-sm cursor-pointer mt-5 border-2 border-gray-600 px-4 py-2 rounded-xl"
      >
        Torna indietro
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      farmland: {},
      fields: [
        {
          label: "Terreno",
          code: "landType",
          type: "select",
          options: [
            {
              label: "Argilloso",
              code: "argilloso",
            },
            {
              label: "Sabbioso",
              code: "sabbioso",
            },
            {
              label: "Ghiaioso",
              code: "ghiaioso",
            },
            {
              label: "Tufo",
              code: "tufo",
            },
          ],
        },
        {
          label: "Dimensione",
          code: "size",
          type: "text",
          filter: "ettari"
        },
        {
          label: "Disponibile subito",
          code: "available",
          type: "checkbox",
        },
      ],
    };
  },
  async mounted() {
    let farmlandId = this.$route.params.id;

    let response = await axios.get(
      "http://localhost:8000/api/farmlands/" + farmlandId
    );
    console.log(response);
    this.farmland = response.data;
  },
  methods: {
    goToList() {
      this.$router.push("/");
    },
  },
};
</script>