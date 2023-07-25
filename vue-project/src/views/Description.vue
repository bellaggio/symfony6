<script lang="ts">
import {defineComponent} from "vue";
import endpointsConfig from "@/service/endpoints.config";
import { Description , Book } from "./DataInterfaces"



export default defineComponent({
  name: "Description",
  data() {
    return {
      description: [] as Description[],
      book: Promise<Book>
    }
  },
  async mounted() {
    await this.axios.get(endpointsConfig.ApiBaseUrl+'/get/description/'+this.$route.params.id).then((response) => {
      this.description = response.data;
      this.book = response.data[0].book;
    });
  }
});
</script>

<template>
  <header>
    <div class="h3">Description</div><br>
    <div class="m-4"><a href="javascript:history.back()" class="btn btn-secondary btn-lg active">back</a></div>
  </header>
  <section>
    <div class="card" style="width: 18rem;">
      <div class="card-header">
        Title: {{book.title}}
      </div>
      <div class="card-body">
        <div v-for="data in description">
          <div class="container-fluid">
            Description: {{data.description}}
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>