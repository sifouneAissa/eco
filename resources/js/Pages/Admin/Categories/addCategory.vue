<template>
  <Add @resetModel="resetModel" :id="'add-product-category'" title="Add Category">
    <div class="modal-body mx-3 bg">
      <form @submit.prevent="submit">
        <div class="mb-5 form-label-group">
          <div class="form-group">
            <label>Name</label>
            <input
              v-model="form.name"
              type="text"
              class="form-control"
              placeholder="Product Name"
            />
            <div v-show="form.errors.name">
              <p class="text-sm" style="color: red">
                {{ form.errors.name }}
              </p>
            </div>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea
              class="form-control"
              v-model="form.desc"
              placeholder="Description"
            ></textarea>
            <div v-show="form.errors.desc">
              <p class="text-sm text-red-600" style="color: red">
                {{ form.errors.desc }}
              </p>
            </div>
          </div>

            <div class=form-group>
                <div class="custom-control custom-radio custom-control-inline">
                    <input v-model="form.show_in_dash" type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label " for="customRadioInline1">Show in Dashboard</label>
                </div>
            </div>
        </div>

        <div class="modal-footer d-flex">
          <button
            type="button"
            class="btn btn-outline-primary"
            @click="resetModel"
            data-dismiss="modal"
          >
            {{ $t("account.addresses.add_card.cancel") }}</button
          ><button type="submit" class="btn btn-primary">
            {{ $t("account.addresses.add_card.save") }}
          </button>
        </div>
      </form>
    </div>
  </Add>
</template>
<script>
import Add from "@/Pages/Admin/DataTable/Modals/Add.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Add,
  },
  props: {},
  mounted() {
    let app = this;
    let modal = $("#add-product-category");
    modal.on("hidden.bs.modal", function () {
      app.$emit("ResetModel");
    });
    modal.modal("show");
  },
  data() {
    return {
      form: useForm({
        name: "",
        desc: "",
        show_in_dash : ""
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
          desc: data.desc,
          show_in_dash:  data.show_in_dash
        }))
        .post(route("admin.category.store", {}), {
          onFinish: () => {},
          onSuccess: () => {
            $("#add-product-category").modal("hide");
            $("#dataTable").DataTable().ajax.reload();
            this.$emit("ResetModel");
          },
        });
    },
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
