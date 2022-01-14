<template>
  <div class="flex items-center p-3 bg-green-200">
    <div @click="goToList()" class="cursor-pointer">
      <span class="text-green-900 font-bold">Farm</span>
      <span class="text-green-600">lands</span>
    </div>
    <div class="ml-auto">
      <button @click="createFarmland()" class="p-2 text-green-900">
        Crea annuncio
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: "Navigation",
  methods: {
    createFarmland() {
      if (this.currentRoute != "create_farmland") {
        this.$router.push({
          name: "create_farmland",
        });
      }
    },
    goToList() {
      if (this.currentRoute != "list_farmlands") {
        this.$router.push({
          name: "list_farmlands",
        });
      }
    },
  },
  computed: {
    currentRoute() {
      return this.$route.matched[0].name;
    }
  },
};
</script>