<template>
  <div
    class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
  >
    <div class="list-card-image">
      <!--                        <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
      <!--                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="icofont-heart"></i></a></div>-->
      <div v-if="model.isA.remain === 1" class="member-plan position-absolute">
        <span class="badge badge-danger">{{ $t("listing.one_product") }}</span>
      </div>
      <div v-else-if="model.isA.remain <= 5" class="member-plan position-absolute">
        <span class="badge badge-warning">{{ $t("listing.limited") }}</span>
      </div>
      <a @click="go()">
        <img
          :src="model.fimage"
          class="img-fluid item-img"
          style="width: 100%; height: 10vw"
        />
      </a>
    </div>
    <div class="p-3 position-relative">
      <div class="list-card-body">
        <h6 class="mb-1">
          <a href="#" class="text-black">{{ model.name }} </a>
        </h6>
        <p class="text-gray mb-2">{{ model.desc }}</p>
        <p class="text-gray time mb-0">
          <a class="btn btn-link btn-sm pl-0 text-black pr-0" href="#"
            >{{ $page.props.currency_code }} {{ model.cprice }}
          </a>
          <span class="badge badge-primary">{{ $t("listing.new") }}</span>
          <span class="float-right">
            <span class="count-number">
              <button
                @click="incrQP(model, -1)"
                class="btn btn-outline-secondary btn-sm left dec"
              >
                <i class="icofont-minus"></i>
              </button>
              <input
                v-model="model.quantity"
                class="count-number-input"
                type="text"
                readonly=""
              />
              <button
                @click="incrQP(model, +1)"
                class="btn btn-outline-secondary btn-sm right inc"
              >
                <i class="icofont-plus"></i>
              </button>
            </span>
            <button class="btn btn-outline-secondary btn-sm m-2" @click="submit(model)">
              {{ $t("listing.add") }}
            </button>
          </span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toastification";

export default {
  props: ["model"],

  methods: {
    incrQP(model, by) {
      const toast = useToast();

      model.quantity = model.quantity + by;
      if (model.quantity > model.isA.remain) {
        toast.warning("Max Quantity of product : " + model.name);
        model.quantity = model.isA.remain;
      }

      if (!model.quantity) model.quantity = 1;
    },
    go: function () {
      Inertia.get(route("product.show", { id: this.model.id }));
    },
    submit: function (model) {
      let app = this;
      let form = useForm({
        product_id: model.id,
        quantity: model.quantity,
      });

      form
        .transform((data) => ({
          ...data,
        }))
        .post(route("addProduct"), {
          // onFinish: () => add_form.reset(),
          onSuccess: function (res) {
            Inertia.reload();
          },
        });
    },
  },
};
</script>
