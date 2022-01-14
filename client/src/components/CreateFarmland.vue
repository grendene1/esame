<template>
  <div class="w-full max-w-screen-md mx-auto py-8 px-3">
    <div class="flex flex-col mb-3" v-for="field in fields" :key="field.code">
      <label class="mb-2 font-bold text-red-900" :for="field.code">{{
        field.label
      }}</label>
      <input
        v-if="field.type == 'text'"
        class="border border-gray-200 p-2 rounded"
        type="text"
        :id="field.code"
        v-model="newFarmland[field.code]"
      />
      <input
        v-if="field.type == 'number'"
        class="border border-gray-200 p-2 rounded"
        type="number"
        :id="field.code"
        v-model="newFarmland[field.code]"
      />
      <input
        v-if="field.type == 'checkbox'"
        class="border border-gray-200 p-2 rounded w-4 h-4"
        type="checkbox"
        :id="field.code"
        v-model="newFarmland[field.code]"
      />
      <select
        v-if="field.type == 'select'"
        class="border border-gray-200 p-2 rounded bg-white"
        :name="field.code"
        :id="field.code"
        v-model="newFarmland[field.code]"
      >
        <option
          v-for="option in field.options"
          :key="option.code"
          :value="option.code"
        >
          {{ option.label }}
        </option>
      </select>

    </div>
    <div class="pt-3">
      <button
        @click="createFarmland()"
        :disabled="!formIsValid"
        class="disabled:bg-gray-300 disabled:cursor-not-allowed p-2 px-3 rounded bg-red-800 text-white"
      >
        {{ $route.name == "edit_farmland" ? "Salva" : "Crea" }}
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      fields: [
        {
          label: "Comune",
          code: "city",
          type: "text",
        },
        {
          label: "Foto",
          code: "photo",
          type: "text",
        },
        {
          label: "Canone offerta",
          code: "rental",
          type: "number",
        },
        {
          label: "Tipo di terreno",
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
      newFarmland: {
        city: "",
        photo: "",
        rental: 0,
        landType: "",
        size: "",
        available: false,
        cadastralMap: "",
        cadastralParcel: "", 
        irrigationType: "",
        offerType: ""
      },
    };
  },
  async mounted() {
    if (this.$route.name == "edit_farmland") {
      let response = await axios.get(
        "http://localhost:8000/api/farmlands/" + this.$route.params.id
      );
      this.newFarmland = response.data;
    }
  },
  methods: {
    async createFarmland() {
      if (this.$route.name == "edit_farmland") {
        let response = await axios.put(
          "http://localhost:8000/api/farmlands/" + this.$route.params.id,
          this.newFarmland
        );

        if (response.status == 200) {
          this.$router.push("/");
        }
      } else {
        let response = await axios.post(
          "http://localhost:8000/api/farmlands",
          this.newFarmland
        );

        if (response.status == 201) {
          this.$router.push("/");
        }
      }
    },
  },
  computed: {
    formIsValid() {
      return (
        this.newFarmland.city != "" &&
        this.newFarmland.photo != "" &&
        this.newFarmland.rental > 0 &&
        this.newFarmland.landType != "" &&
        this.newFarmland.size != ""
      );
    },
  },
};
</script>
