<script lang="ts">
import "bootstrap";
import { defineComponent } from "vue";
import endpointsConfig from "@/service/endpoints.config";
import { Book } from "./DataInterfaces"

export default defineComponent({
  name: "book",
  data() {
    return {
      book: [] as Book[],
    }
  },
  async mounted() {
    await this.axios.get(endpointsConfig.ApiBaseUrl+'/get/book').then((response) => {
      console.log(response);
      this.book = response.data;
    });
  }
});
</script>

<template>
  <div>
    <div class="h3">Books</div>
    <div>
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <td scope="col">#</td>
            <td scope="col">Title</td>
            <td scope="col">Price</td>
            <td scope="col">Description</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in book">
            <td scope="row">#{{item.id}}</td>
            <td>{{item.title}}</td>
            <td>{{item.price}}</td>
            <td><router-link :to="`/description/${item.id}`">See more</router-link></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>

</style>