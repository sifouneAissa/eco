<script>
import PListing from "@/Pages/Listing/Listing.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  props: ["title"],
  components: {
    PListing,
  },
  data() {
    return {
      // values : []
    };
  },
  mounted() {},
  watch: {},
  methods: {
    setCategory: function (cat) {
      return !!(
        this.$page.props.query &&
        (cat.name === this.$page.props.query.category ||
          cat.name === this.$page.props.query)
      );
    },
    submit: function (category, event) {
      let app = this;
      console.log(category.name);
      useForm({
        query: event.target.checked ? category.name : "",
      }).get(route("listing"));
    },
  },
};
</script>

<template>
  <Head :title="title" />

  <section class="breadcrumb-osahan pt-5 pb-5 bg-dark position-relative text-center">
    <h1 class="text-white">{{ $t("listing.desc1") }}</h1>
    <h6 class="text-white-50">{{ $t("listing.desc2") }}</h6>
    <div v-if="$page.props.thanks" class="mt-4">
        <button class="btn btn-success ml-2">Shop more</button>
        <button class="btn btn-dark">Thank you</button>
    </div>
  </section>

  <section class="section pt-5 pb-5 products-listing">
    <div class="container">
      <div class="row d-none-m">
        <div class="col-md-12">
          <!-- <div class="dropdown float-right">
            <a
              class="btn btn-outline-info dropdown-toggle btn-sm border-white-btn"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Sort by: <span class="text-theme">Distance</span> &nbsp;&nbsp;
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
              <a class="dropdown-item" href="#">Distance</a>
              <a class="dropdown-item" href="#">No Of Offers</a>
              <a class="dropdown-item" href="#">Rating</a>
            </div>
          </div> -->
          <h4 class="font-weight-bold mt-0 mb-3">
            {{ $t("listing.offers") }}
            <small class="h6 mb-0 ml-2"
              >{{ $page.props.count }} {{ $t("listing.products") }}
            </small>
          </h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="filters shadow-sm rounded bg-white mb-4">
            <div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
              <h5 class="m-0">{{ $t("listing.filter_by") }}</h5>
            </div>
            <div class="filters-body">
              <div id="accordion">
                <div class="filters-card border-bottom p-4">
                  <div class="filters-card-header" id="headingOne">
                    <h6 class="mb-0">
                      <a
                        href="#"
                        class="btn-link"
                        data-toggle="collapse"
                        data-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        {{ $t("listing.categories") }}
                        <i class="icofont-arrow-down float-right"></i>
                      </a>
                    </h6>
                  </div>
                  <div
                    id="collapseOne"
                    class="collapse show"
                    aria-labelledby="headingOne"
                    data-parent="#accordion"
                  >
                    <div class="filters-card-body card-shop-filters">
                      <div
                        v-for="category in $page.props.categories"
                        :key="category.id"
                        class="custom-control custom-checkbox"
                      >
                        <input
                          @click="submit(category, $event)"
                          :checked="setCategory(category)"
                          type="checkbox"
                          class="custom-control-input"
                          :id="'cb'+category.id"
                        />
                        <label class="custom-control-label" :for="'cb'+category.id"
                          >{{ category.name }}
                          <small class="text-black-50">({{ category.count }})</small>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="filters pt-2">
            <div class="filters-body rounded shadow-sm bg-white">
              <div class="filters-card p-4">
                <div>
                  <div class="filters-card-body card-shop-filters pt-0">
                    <div class="custom-control custom-radio">
                      <input
                        type="radio"
                        id="customRadio1"
                        name="customRadio"
                        class="custom-control-input"
                        checked=""
                      />
                      <label class="custom-control-label" for="customRadio1"
                        >Gold Partner</label
                      >
                    </div>
                    <div class="custom-control custom-radio mt-1 mb-1">
                      <input
                        type="radio"
                        id="customRadio2"
                        name="customRadio"
                        class="custom-control-input"
                      />
                      <label class="custom-control-label" for="customRadio2"
                        >Order Food Online</label
                      >
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        type="radio"
                        id="customRadio3"
                        name="customRadio"
                        class="custom-control-input"
                        checked=""
                      />
                      <label class="custom-control-label" for="customRadio3"
                        >Osahan Eat</label
                      >
                    </div>
                    <hr />
                    <small class="text-success"
                      >Use code OSAHAN50 to get 50% OFF (up to $30) on first 5 orders.
                      T&Cs apply.</small
                    >
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <PListing />
      </div>
    </div>
  </section>

  <!-- <section class="section pt-5 pb-5 text-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
                </div>
            </div>
        </div>
    </section> -->
</template>

<style scoped></style>
