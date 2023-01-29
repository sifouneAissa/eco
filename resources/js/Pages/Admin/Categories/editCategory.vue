<template>
  <Update @resetModel="resetModel" :id="model.modal_ids.edit" title="Edit Category">
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
             <edit-t :type="'input'" @write="write" :attr="'Name'" :keyV="'name'" :model="this.model" :cvalues="this.form.langs"/>
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

              <edit-t :type="'textarea'" @write="write" :attr="'Description'" :keyV="'desc'" :model="this.model" :cvalues="this.form.langs"/>
            <div v-show="form.errors.desc">
              <p class="text-sm text-red-600" style="color: red">
                {{ form.errors.desc }}
              </p>
            </div>
          </div>

            <div class="mb-5 form-label-group">
                <div class="form-group">
                    <label>Section to show (Dashboard)</label>
                    <multiselect
                        v-model="form.show_in_dash"
                        :options="$page.props.sections"
                        label="name"
                        track-by="name"
                        :multiple="false"
                        placeholder="Select section"
                    ></multiselect>
                    <!--                    <div v-show="form.errors.product_category_id">-->
                    <!--                        <p class="text-sm " style="color: red">-->
                    <!--                            {{ form.errors.product_category_id }}-->
                    <!--                        </p>-->
                    <!--                    </div>-->
                </div>
            </div>
<!--            <div class=form-group>-->
<!--                <div class="custom-control custom-radio custom-control-inline">-->
<!--                    <input v-model="form.show_in_dash" type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">-->
<!--                    <label class="custom-control-label " for="customRadioInline1">Show in Dashboard</label>-->
<!--                </div>-->
<!--            </div>-->
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
import editT from '@/Pages/Admin/Translations/updateTranslation.vue';

import Multiselect from 'vue-multiselect'

export default {
  components: {
    Update,editT,Multiselect
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
        desc: this.model.desc,
        show_in_dash : this.$page.props.sections.find((item) => item.id === this.model.show_in_dash),
        langs : []
      }),
    };
  },
  methods: {
    resetModel: function () {
      this.$emit("ResetModel");
    },
      write(ditem){
          this.form.langs = ditem;
      },
    submit: function () {
      // this.form
      this.form
        .transform((data) => ({
          name: data.name,
          desc: data.desc,
          show_in_dash:  data.show_in_dash.id,
          langs : JSON.stringify(data.langs)
        }))
        .patch(
          route("admin.category.update", {
            category : this.model.id,
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

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
