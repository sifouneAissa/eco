<template>
  <div class="ltn__shop-details-inner mb-60">
    <div class="row">
      <div class="col-md-6">
        <div class="ltn__shop-details-img-gallery">
          <div class="ltn__shop-details-large-img">
            <div
              v-for="media in $page.props.product.media"
              :key="media.id"
              class="single-large-img"
            >
              <a :href="media.url" data-rel="lightcase:myCollection">
                <img :src="media.url" alt="Image" />
              </a>
            </div>
          </div>
          <div class="ltn__shop-details-small-img slick-arrow-2">
            <div
              v-for="media in $page.props.product.media"
              :key="media.id"
              class="single-small-img"
            >
              <img :src="media.url" alt="Image" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="modal-product-info shop-details-info pl-0">
          <div class="product-ratting">
            <ul>
              <li>
                <a href="#"><i class="fas fa-star"></i></a>
              </li>
              <li>
                <a href="#"><i class="fas fa-star"></i></a>
              </li>
              <li>
                <a href="#"><i class="fas fa-star"></i></a>
              </li>
              <li>
                <a href="#"><i class="fas fa-star-half-alt"></i></a>
              </li>
              <li>
                <a href="#"><i class="far fa-star"></i></a>
              </li>
              <li class="review-total">
                <a href="#"> ( 95 {{ $t("listing.reviews") }} )</a>
              </li>
            </ul>
          </div>
          <h3>{{ $page.props.product.lname }}</h3>
          <div class="product-price">
            <span>{{ $page.props.currency_code }} {{ $page.props.product.cprice }}</span>
            <del>{{ $page.props.currency_code }} {{ $page.props.product.coprice }}</del>
          </div>
          <div class="modal-product-meta ltn__product-details-menu-1">
            <ul>
              <li>
                <strong>{{ $t("listing.category") }} : </strong>
                <span>
                  <a href="#">{{ $page.props.product.category.lname }}</a>
                </span>
              </li>
            </ul>
          </div>
          <div class="ltn__product-details-menu-2 row">
            <ul>
              <li>
                <div id="qid" class="cart-plus-minus">
                  <!--                                    <div @click="incrQP($page.props.product, -1)" class="dec qtybutton">-</div>-->
                  <input id="quid" type="text" value="1" class="cart-plus-minus-box" />
                  <!--                                    <div @click="incrQP($page.props.product, +1)" class="inc qtybutton">+</div>-->
                </div>
              </li>
              <li @click="$page.props.productTo = $page.props.product">
                <a
                  href="#"
                  class="theme-btn-1 btn btn-effect-1"
                  title="Add to Cart"
                  data-toggle="modal"
                  data-target="#add_to_cart_modal"
                >
                  <i class="fas fa-shopping-cart"></i>
                  <span>{{ $t("dashboard.section3.add_cart") }}</span>
                </a>
              </li>
              <li @click="$page.props.productToCheckout = $page.props.product">
                    <a
                        href="#"
                        class="theme-btn-1 btn btn-effect-1"
                        :title="'Checkout'"
                        data-toggle="modal"
                        :data-target="'#checkout_modal'"
                    >
                        <i class="fas fa-money-bill"></i>
                    </a>
              </li>
            </ul>
          </div>
          <!--                    <div class="ltn__product-details-menu-3">-->
          <!--                        <ul>-->
          <!--                            <li>-->
          <!--                                <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
          <!--                                    <i class="far fa-heart"></i>-->
          <!--                                    <span>Add to Wishlist</span>-->
          <!--                                </a>-->
          <!--                            </li>-->
          <!--                            <li>-->
          <!--                                <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">-->
          <!--                                    <i class="fas fa-exchange-alt"></i>-->
          <!--                                    <span>Compare</span>-->
          <!--                                </a>-->
          <!--                            </li>-->
          <!--                        </ul>-->
          <!--                    </div>-->
          <hr />
          <div class="ltn__social-media">
            <ul>
              <li>{{ $t("listing.share") }}:</li>
              <li>
                <a :href="$page.props.facebook" target="_blank" title="Facebook"
                  ><i class="fab fa-facebook-f"></i
                ></a>
              </li>
              <li>
                <a :href="$page.props.twitter" target="_blank" title="Twitter"
                  ><i class="fab fa-twitter"></i
                ></a>
              </li>
              <!-- <li>
                <a href="#" target="_blank" title="Linkedin"
                  ><i class="fab fa-linkedin"></i
                ></a>
              </li> -->
              <li>
                <a :href="$page.props.instagram" target="_blank" title="Instagram"
                  ><i class="fab fa-instagram"></i
                ></a>
              </li>
              <li>
                <a :href="$page.props.youtube" target="_blank" title="youtube"
                  ><i class="fab fa-youtube"></i
                ></a>
              </li>
            </ul>
          </div>
          <hr />
          <div class="ltn__safe-checkout">
            <h5>Guaranteed Safe Checkout</h5>
            <img src="/img/icons/payment-2.png" alt="Payment Image" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useToast } from "vue-toastification";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "productImgs.vue",

  mounted() {
    let app = this;
    // let quick_view_modal = $("#quick_view_modal");
    //
    // quick_view_modal.on("hidden.bs.modal", function () {
    //     // app.$page.props.product=null;
    // });
    $("#qid").click(function () {
      if ($("#quid").val() > app.$page.props.product.isA.remain) {
        const toast = useToast();
        $("#quid").val(app.$page.props.product.isA.remain);
        toast.warning(app.$t("listing.limited") + app.$page.props.product.lname);
      }

      if ($("#quid").val() === "0") $("#quid").val("1");

      app.$page.props.product.quantity = $("#quid").val();
    });
  },
  methods: {
    incrQP(by) {
      const toast = useToast();

      product.quantity = product.quantity + by;

      if (item.quantity > product.isA.remain) {
        item.quantity = product.isA.remain;
        toast.warning(this.$t("listing.limited") + product.lname);
      }

      if (!item.quantity) item.quantity = 1;

      // if (q !== item.quantity) this.submit(item, by);
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
    submitD(item) {
      Inertia.delete(
        route("cartitem.destroy", {
          id: item.id,
        }),
        {
          onSuccess: (res) => {},
        }
      );
    },
    Pay() {
      this.$emit("Pay");
    },
    holdInput(val) {
      console.log(val);
    },
  },
};
</script>
