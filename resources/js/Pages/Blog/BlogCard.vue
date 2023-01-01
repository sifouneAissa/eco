<template>
  <div
    class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
  >
    <div class="p-3 position-relative">
      <div class="list-card-body">
        <h6 class="mb-1">
          <a href="#" class="text-black">{{ model.title }} </a>
        </h6>
        <!-- <p class="text-gray mb-2">{{ model.desc }}</p> -->
        <p class="text-gray time mb-0">
          <span class="float-right">
            <button class="btn btn-outline-secondary btn-sm m-2">Details</button>
          </span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["model"],

  methods: {},
};
</script>
