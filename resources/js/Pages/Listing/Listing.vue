<template>
  <!--  <div class="col-md-9">-->
  <!--    <div class="owl-carousel owl-carousel-category owl-theme list-cate-page mb-4">-->
  <!--      <Categories />-->
  <!--    </div>-->

  <!--    <div class="row">-->
  <!--      <div-->
  <!--        v-for="(product, index) in $page.props.products"-->
  <!--        :key="product.id"-->
  <!--        class="col-md-4 col-sm-6 mb-4"-->
  <!--      >-->
  <!--        <div-->
  <!--          class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
  <!--        >-->
  <!--          <div class="list-card-image">-->
  <!--            &lt;!&ndash;                        <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>&ndash;&gt;-->
  <!--            &lt;!&ndash;                        <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="icofont-heart"></i></a></div>&ndash;&gt;-->
  <!--            <div v-if="product.isA.remain === 1" class="member-plan position-absolute">-->
  <!--              <span class="badge badge-danger">{{ $t("listing.one_product") }}</span>-->
  <!--            </div>-->
  <!--            <div-->
  <!--              v-else-if="product.isA.remain <= 5"-->
  <!--              class="member-plan position-absolute"-->
  <!--            >-->
  <!--              <span class="badge badge-warning">{{ $t("listing.limited") }}</span>-->
  <!--            </div>-->
  <!--            <Link :href="route('product.show', { id: product.id })">-->
  <!--              <img-->
  <!--                :src="product.fimage"-->
  <!--                class="img-fluid item-img"-->
  <!--                style="width: 100%; height: 10vw"-->
  <!--              />-->
  <!--            </Link>-->
  <!--          </div>-->
  <!--          <div class="p-3 position-relative">-->
  <!--            <div class="list-card-body">-->
  <!--              <h6 class="mb-1">-->
  <!--                <a href="#" class="text-black">{{ product.name }} </a>-->
  <!--              </h6>-->
  <!--              <p class="text-gray mb-2">{{ product.desc }}</p>-->
  <!--              <p class="text-gray time mb-0">-->
  <!--                <a class="btn btn-link btn-sm pl-0 text-black pr-0" href="#"-->
  <!--                  >{{ $page.props.currency_code }} {{ product.cprice }}-->
  <!--                </a>-->
  <!--                <span class="badge badge-primary">{{ $t("listing.new") }}</span>-->
  <!--                <span class="float-right">-->
  <!--                  <span class="count-number">-->
  <!--                    <button-->
  <!--                      @click="incrQP(product, -1)"-->
  <!--                      class="btn btn-outline-secondary btn-sm left dec"-->
  <!--                    >-->
  <!--                      <i class="icofont-minus"></i>-->
  <!--                    </button>-->
  <!--                    <input-->
  <!--                      v-model="product.quantity"-->
  <!--                      class="count-number-input"-->
  <!--                      type="text"-->
  <!--                      readonly=""-->
  <!--                    />-->
  <!--                    <button-->
  <!--                      @click="incrQP(product, +1)"-->
  <!--                      class="btn btn-outline-secondary btn-sm right inc"-->
  <!--                    >-->
  <!--                      <i class="icofont-plus"></i>-->
  <!--                    </button>-->
  <!--                  </span>-->
  <!--                  <button-->
  <!--                    class="btn btn-outline-secondary btn-sm m-2"-->
  <!--                    @click="submit(product)"-->
  <!--                  >-->
  <!--                    {{ $t("listing.add") }}-->
  <!--                  </button>-->
  <!--                </span>-->
  <!--              </p>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="col-md-12 text-center load-more">-->
  <!--        <button class="btn btn-primary" type="button" disabled>-->
  <!--          <span-->
  <!--            class="spinner-grow spinner-grow-sm"-->
  <!--            role="status"-->
  <!--            aria-hidden="true"-->
  <!--          ></span>-->
  <!--          {{ $t("listing.loading") }} ...-->
  <!--        </button>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <div class="ltn__gallery-active row ltn__gallery-style-2 ltn__gallery-info-hide---">
    <div class="ltn__gallery-sizer col-1"></div>
    <!-- gallery-item -->
    <div
      v-for="(product, index) in $page.props.products"
      :key="product.id"
      :class="
        'ltn__gallery-item col-lg-3 col-md-4 col-sm-6 col-12' +
        ' filter_category_' +
        product.product_category_id
      "
    >
      <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
      <!--                <div class="product-img">-->
      <!--                    <a href="product-details.html"><img style="height: 200px" :src="product.fimage" alt="#"></a>-->
      <!--                    <div class="product-badge">-->
      <!--                        <ul>-->
      <!--                            <li class="sale-badge">New</li>-->
      <!--                        </ul>-->
      <!--                    </div>-->
      <!--                    <div class="product-hover-action">-->
      <!--                        <ul>-->
      <!--                            <li @click="$page.props.product=product">-->
      <!--                                <a href="#" title="Quick View" data-toggle="modal" :data-target="'#quick_view_modal'">-->
      <!--                                    <i    class="far fa-eye"></i>-->
      <!--                                </a>-->
      <!--                            </li>-->
      <!--                            <li @click="$page.props.product=product">-->
      <!--                                <a  href="#" title="Add to Cart" data-toggle="modal" :data-target="'#add_to_cart_modal'">-->
      <!--                                    <i class="fas fa-shopping-cart"></i>-->
      <!--                                </a>-->
      <!--                            </li>-->
      <!--                            <li>-->
      <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
      <!--                                    <i class="far fa-heart"></i></a>-->
      <!--                            </li>-->
      <!--                        </ul>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--                <div class="product-info">-->
      <!--                    <h2 class="product-title"><a href="product-details.html">{{product.name}}</a></h2>-->
      <!--                    <div class="product-price">-->
      <!--                        <span>$149.00</span>-->
      <!--                        <del>{{ $page.props.currency_code }} {{ product.cprice }}</del>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <ProductCard :model="product" :img_height="200" />
    </div>
  </div>
  <!--    <div class="ltn__gallery-active row ltn__gallery-style-2 ltn__gallery-info-hide-&#45;&#45;">-->
  <!--        <div class="ltn__gallery-sizer col-1"></div>-->

  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3 col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$149.00</span>-->
  <!--                        <del>$162.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_2  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$129.00</span>-->
  <!--                        <del>$145.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_1  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$119.00</span>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/4.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Facewash</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$125.00</span>-->
  <!--                        <del>$140.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_2  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/5.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Shampoo</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$165.00</span>-->
  <!--                        <del>$185.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_1  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/6.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$149.00</span>-->
  <!--                        <del>$162.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/7.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$129.00</span>-->
  <!--                        <del>$145.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_2  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/8.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$119.00</span>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_1  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/9.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$149.00</span>-->
  <!--                        <del>$162.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/10.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$129.00</span>-->
  <!--                        <del>$145.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_2  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/11.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$149.00</span>-->
  <!--                        <del>$162.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_1  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/12.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$119.00</span>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3 col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/13.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Care Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$149.00</span>-->
  <!--                        <del>$162.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_2  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/14.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Vitamins</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$129.00</span>-->
  <!--                        <del>$145.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_1  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/15.png" alt="#"></a>-->
  <!--                    <div class="product-badge">-->
  <!--                        <ul>-->
  <!--                            <li class="sale-badge">New</li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Growth Oil</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$119.00</span>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--        &lt;!&ndash; gallery-item &ndash;&gt;-->
  <!--        <div class="ltn__gallery-item filter_category_3  col-lg-3 col-md-4 col-sm-6 col-12">-->
  <!--            <div class="ltn__product-item ltn__product-item-3 text-center">-->
  <!--                <div class="product-img">-->
  <!--                    <a href="product-details.html"><img src="img/product/16.png" alt="#"></a>-->
  <!--                    <div class="product-hover-action">-->
  <!--                        <ul>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">-->
  <!--                                    <i class="far fa-eye"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">-->
  <!--                                    <i class="fas fa-shopping-cart"></i>-->
  <!--                                </a>-->
  <!--                            </li>-->
  <!--                            <li>-->
  <!--                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">-->
  <!--                                    <i class="far fa-heart"></i></a>-->
  <!--                            </li>-->
  <!--                        </ul>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--                <div class="product-info">-->
  <!--                    <h2 class="product-title"><a href="product-details.html">Beard Facewash</a></h2>-->
  <!--                    <div class="product-price">-->
  <!--                        <span>$125.00</span>-->
  <!--                        <del>$140.00</del>-->
  <!--                    </div>-->
  <!--                </div>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--    </div>-->

  <div class="btn-wrapper text-center">
    <a href="#" class="btn btn-transparent btn-effect-3 btn-border">
      <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      {{ $t("listing.loading") }}</a
    >
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head, Link } from "@inertiajs/inertia-vue3";
import Categories from "@/Pages/Listing/Categories.vue";
import { useToast } from "vue-toastification";
import ProductCard from "@/Pages/Listing/ProductCard.vue";

export default {
  name: "listing.vue",
  components: { Categories, Link, ProductCard },
  date() {
    return {
      quantity: [],
      tomodel: this.$page.props.products[0],
    };
  },
  methods: {
    incrQP(model, by) {
      const toast = useToast();
      model.quantity = model.quantity + by;
      if (model.quantity > model.isA.remain) {
        model.quantity = model.isA.remain;
        toast.warning(this.$t("listing.limited") + model.name);
      }

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
