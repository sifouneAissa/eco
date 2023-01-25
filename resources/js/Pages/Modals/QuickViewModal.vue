<template>
  <!-- MODAL AREA START (Quick View Modal) -->
  <div class="ltn__modal-area ltn__quick-view-modal-area">
    <div class="modal fade" id="quick_view_modal" tabindex="-1">
      <div
        v-if="$page.props.productTo"
        :key="$page.props.productTo.id"
        class="modal-dialog modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <!-- <i class="fas fa-times"></i> -->
            </button>
          </div>
          <div class="modal-body">
            <div class="ltn__quick-view-modal-inner">
              <div class="modal-product-item">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <div class="modal-product-img">
                      <img :src="$page.props.productTo.fimage" alt="#" />
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="modal-product-info">
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
                      <h3>{{ $page.props.productTo.lname }}</h3>
                      <div class="product-price">
                        <span
                          >{{ $page.props.currency_code }}
                          {{ $page.props.productTo.cprice }}</span
                        >
                        <del
                          >{{ $page.props.currency_code }}
                          {{ $page.props.productTo.coprice }}</del
                        >
                      </div>
                      <div class="modal-product-meta ltn__product-details-menu-1">
                        <ul>
                          <li>
                            <strong>{{ $t("listing.category") }} : </strong>
                            <span>
                              <a href="#">{{ $page.props.productTo.category.lname }}</a>
                              <!--                                                            <a href="#">Oil</a>-->
                              <!--                                                            <a href="#">Grooming</a>-->
                              <!--                                                            <a href="#">Tools</a>-->
                            </span>
                          </li>
                        </ul>
                      </div>
                      <div class="ltn__product-details-menu-2">
                        <ul>
                          <li>
                            <div class="cart-plus-minus">
                              <div
                                @click="incrQP($page.props.productTo, -1)"
                                class="dec qtybutton"
                              >
                                -
                              </div>
                              <input
                                type="text"
                                :value="$page.props.productTo.quantity"
                                name="qtybutton"
                                class="cart-plus-minus-box"
                              />
                              <div
                                @click="incrQP($page.props.productTo, +1)"
                                class="inc qtybutton"
                              >
                                +
                              </div>
                            </div>
                          </li>
                          <li @click="submit($page.props.productTo)">
                            <a
                              href="#"
                              class="theme-btn-1 btn btn-effect-1"
                              title="$t('dashboard.section3.add_cart')"
                            >
                              <!--                                                           data-toggle="modal"-->
                              <!--                                                           data-target="#add_to_cart_modal"-->

                              <i class="fas fa-shopping-cart"></i>
                              <span>{{ $t("dashboard.section3.add_cart") }}</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <!--                                            <div class="ltn__product-details-menu-3">-->
                      <!--                                                <ul>-->
                      <!--                                                    <li>-->
                      <!--                                                        <a href="#" class="" title="Wishlist"-->
                      <!--                                                           data-toggle="modal"-->
                      <!--                                                           data-target="#liton_wishlist_modal">-->
                      <!--                                                            <i class="far fa-heart"></i>-->
                      <!--                                                            <span>Add to Wishlist</span>-->
                      <!--                                                        </a>-->
                      <!--                                                    </li>-->
                      <!--                                                    <li>-->
                      <!--                                                        <a href="#" class="" title="Compare" data-toggle="modal"-->
                      <!--                                                           data-target="#quick_view_modal">-->
                      <!--                                                            <i class="fas fa-exchange-alt"></i>-->
                      <!--                                                            <span>Compare</span>-->
                      <!--                                                        </a>-->
                      <!--                                                    </li>-->
                      <!--                                                </ul>-->
                      <!--                                            </div>-->
                      <hr />
                      <div class="ltn__social-media">
                        <ul>
                          <li>{{ $t("listing.share") }}:</li>
                          <li>
                            <a
                              :href="$page.props.facebook"
                              target="_blank"
                              title="Facebook"
                              ><i class="fab fa-facebook-f"></i
                            ></a>
                          </li>
                          <li>
                            <a :href="$page.props.twitter" target="_blank" title="Twitter"
                              ><i class="fab fa-twitter"></i
                            ></a>
                          </li>
                          <!-- <li>
                            <a href="#" title="Linkedin"
                              ><i class="fab fa-linkedin"></i
                            ></a>
                          </li> -->
                          <li>
                            <a
                              :href="$page.props.instagram"
                              target="_blank"
                              title="Instagram"
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL AREA END -->
</template>
<script>
import { useToast } from "vue-toastification";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  mounted() {
    // let app = this;
    // let quick_view_modal = $("#quick_view_modal");
    //
    // quick_view_modal.on("hidden.bs.modal", function () {
    //     // app.$page.props.product=null;
    // });
  },
  methods: {
    incrQP(item, by) {
      const toast = useToast();
      // let q = item.quantity;
      let product = item;
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
            $("#quick_view_modal").modal("hide");
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
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
  },
};
</script>
