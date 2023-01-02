<template>
  <div class="col-md-9">
    <div class="owl-carousel owl-carousel-category owl-theme list-cate-page mb-4">
      <Categories />
    </div>

    <div class="row">
      <div
        v-for="(product, index) in $page.props.products"
        :key="product.id"
        class="col-md-4 col-sm-6 mb-4"
      >
        <div
          class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
        >
          <div class="list-card-image">
            <!--                        <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
            <!--                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="icofont-heart"></i></a></div>-->
            <div v-if="product.isA.remain === 1" class="member-plan position-absolute">
              <span class="badge badge-danger">One Product</span>
            </div>
            <div
              v-else-if="product.isA.remain <= 5"
              class="member-plan position-absolute"
            >
              <span class="badge badge-warning">The quantity is limited</span>
            </div>
            <Link :href="route('product.show', { id: product.id })">
              <img
                :src="product.fimage"
                class="img-fluid item-img"
                style="width: 100%; height: 10vw"
              />
            </Link>
          </div>
          <div class="p-3 position-relative">
            <div class="list-card-body">
              <h6 class="mb-1">
                <a href="#" class="text-black">{{ product.name }} </a>
              </h6>
              <p class="text-gray mb-2">{{ product.desc }}</p>
              <p class="text-gray time mb-0">
                <a class="btn btn-link btn-sm pl-0 text-black pr-0" href="#"
                  >{{ $page.props.currency_code }} {{ product.cprice }}
                </a>
                <span class="badge badge-primary">{{ $t("listing.new") }}</span>
                <span class="float-right">
                  <span class="count-number">
                    <button
                      @click="incrQP(product, -1)"
                      class="btn btn-outline-secondary btn-sm left dec"
                    >
                      <i class="icofont-minus"></i>
                    </button>
                    <input
                      v-model="product.quantity"
                      class="count-number-input"
                      type="text"
                      readonly=""
                    />
                    <button
                      @click="incrQP(product, +1)"
                      class="btn btn-outline-secondary btn-sm right inc"
                    >
                      <i class="icofont-plus"></i>
                    </button>
                  </span>
                  <button
                    class="btn btn-outline-secondary btn-sm m-2"
                    @click="submit(product)"
                  >
                    {{ $t("listing.add") }}
                  </button>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-center load-more">
        <button class="btn btn-primary" type="button" disabled>
          <span
            class="spinner-grow spinner-grow-sm"
            role="status"
            aria-hidden="true"
          ></span>
          {{ $t("listing.loading") }}...
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head, Link } from "@inertiajs/inertia-vue3";
import Categories from "@/Pages/Listing/Categories.vue";

export default {
  name: "listing.vue",
  components: { Categories, Link },
  date() {
    return {
      quantity: [],
    };
  },
  created() {
    setInterval(function () {
      Inertia.reload({
        only: ["products"],
        preserveScroll: true,
      });
    }, 30000);
  },
  methods: {
    incrQP(model, by) {
      model.quantity = model.quantity + by;
      if (model.quantity > model.isA.remain) model.quantity = model.isA.remain;

      if (!model.quantity) model.quantity = 1;
    },
    submit: function (model) {
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
          onSuccess: function () {},
        });
    },
  },
};
</script>

<style scoped></style>
