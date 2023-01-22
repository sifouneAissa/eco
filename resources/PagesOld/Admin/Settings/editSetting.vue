<template>
  <Update @resetModel="resetModel" :id="model.modal_ids.edit" title="Edit Setting">
    <div class="modal-body mx-3 bg">
      <form @submit.prevent="submit">
        <div class="mb-5 form-label-group">
          <div class="form-group">
            <label>Name</label>
            <input
              v-model="form.name"
              type="text"
              id="name"
              class="form-control"
              placeholder="Setting Name"
            />
            <div v-show="form.errors.name">
              <p class="text-sm" style="color: red">
                {{ form.errors.name }}
              </p>
            </div>
          </div>
          <div class="form-group">
            <label>Content</label>
            <input v-model="form.content" type="text" id="content" class="form-control" />
            <div v-show="form.errors.content">
              <p class="text-sm text-red-600" style="color: red">
                {{ form.errors.content }}
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex">
          <button
            type="button"
            class="btn btn-outline-warning"
            @click="resetModel"
            data-dismiss="modal"
          >
            {{ $t("account.addresses.add_card.cancel") }}</button
          ><button type="submit" class="btn btn-warning">
            {{ $t("account.addresses.add_card.save") }}
          </button>
        </div>
      </form>
    </div>
  </Update>
</template>
<script>
import Update from "@/Pages/Admin/DataTable/Modals/Update.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Multiselect from "vue-multiselect";

export default {
  components: {
    Update,
    Multiselect,
  },
  props: {
    model: Object,
  },
  mounted() {
    let app = this;
    let modal = $("#" + this.model.modal_ids.edit);

    modal.on("hidden.bs.modal", function () {
      app.$emit("ResetModel");
    });
    modal.modal("show");
  },
  data() {
    return {
      form: useForm({
        name: this.model.name,
        content: this.model.content,
        code: this.model.code,
      }),
    };
  },
  methods: {
    resetModel: function () {
      this.$emit("ResetModel");
    },
    submit: function () {
      // this.form
      this.form
        .transform((data) => ({
          name: data.name,
          content: data.content,
          code : data.code
        }))
        .patch(
          route("admin.setting.update", {
            id: this.model.id,
          }),
          {
            onFinish: () => {},
            onSuccess: () => {
              $("#" + this.model.modal_ids.edit).modal("hide");
              $("#dataTable").DataTable().ajax.reload();
              this.$emit("ResetModel");
            },
          }
        );
    },
  },
};
</script>

<style src="../../../../node_modules/vue-multiselect/dist/vue-multiselect.css"></style>
