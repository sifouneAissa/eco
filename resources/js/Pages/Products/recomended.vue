<script >
import Cart from "@/Pages/Products/Cart.vue";
import ProductCard from "@/Pages/Listing/ProductCard.vue";
import ProductCarousel from "@/Pages/Listing/ProductCarousel.vue";
import {useForm} from "@inertiajs/inertia-vue3";
export default  {
    components : {
        Cart,
        ProductCarousel,
        ProductCard
    },
    data (){
        return {
            form  : useForm({
                query : this.$page.props.query
            }),

        }
    },
    methods : {
        submit : function (){
            this.form.get(route("product.show",{id : this.$page.props.product.id}));
        }
    }
}

</script>

<template>
  <section class="offer-dedicated-body pt-2 pb-2 mt-4 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="offer-dedicated-body-left">
            <div class="tab-content" id="pills-tabContent">
              <div
                class="tab-pane fade show active"
                id="pills-order-online"
                role="tabpanel"
                aria-labelledby="pills-order-online-tab"
              >
                <div
                  id="#menu"
                  class="bg-white rounded shadow-sm p-4 mb-4 explore-outlets"
                >
                  <h5 class="mb-4">{{ $t("listing.recommended") }}</h5>
                  <form @submit.prevent="submit()" class="explore-outlets-search mb-4">
                    <div class="input-group">
                      <input
                        v-model="form.query"
                        type="text"
                        :placeholder="$t('listing.search')"
                        class="form-control"
                      />
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-link">
                          <i class="icofont-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <h6 class="mb-3">
                    {{ $t("listing.recommend") }}
                    <span class="badge badge-success"
                      ><i class="icofont-tags"></i> {{ $t("listing.same_category") }}
                    </span>
                  </h6>
                  <ProductCarousel :models="$page.props.sameCategory" />
                </div>
                <div v-if="$page.props.bestSellers.length" class="row">
                  <h5 class="mb-4 mt-3 col-md-12">{{ $t("listing.best_sellers") }}</h5>
                  <div
                    v-for="product in $page.props.bestSellers"
                    :key="product.id"
                    class="col-md-4 col-sm-6 mb-4"
                  >
                    <ProductCard :model="product" />
                  </div>
                </div>
                <!--                                <div class="row">-->
                <!--                                    <h5 class="mb-4 mt-3 col-md-12">Quick Bites <small class="h6 text-black-50">3 ITEMS</small></h5>-->
                <!--                                    <div class="col-md-12">-->
                <!--                                        <div class="bg-white rounded border shadow-sm mb-4">-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Chicken Tikka Sub</h6>-->
                <!--                                                        <p class="text-gray mb-0">$314 - 12" (30 cm)</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BESTSELLER</span></h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-success food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Cheese Spinach corn Roll <span class="badge badge-success">Pure Veg</span></h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="row">-->
                <!--                                    <h5 class="mb-4 mt-3 col-md-12">Starters <small class="h6 text-black-50">3 ITEMS</small></h5>-->
                <!--                                    <div class="col-md-12">-->
                <!--                                        <div class="bg-white rounded border shadow-sm mb-4">-->
                <!--                                            <div class="menu-list p-3 border-bottom">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <img class="mr-3 rounded-pill" src="/img/5.jpg" alt="Generic placeholder image">-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Veg Spring Roll</h6>-->
                <!--                                                        <p class="text-gray mb-0">$314 - 12" (30 cm)</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="menu-list p-3 border-bottom">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <img class="mr-3 rounded-pill" src="/img/2.jpg" alt="Generic placeholder image">-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Stuffed Mushroom <span class="badge badge-danger">BESTSELLER</span></h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="menu-list p-3">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <img class="mr-3 rounded-pill" src="/img/3.jpg" alt="Generic placeholder image">-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Honey Chilli Potato-->
                <!--                                                            <span class="badge badge-success">Pure Veg</span>-->
                <!--                                                        </h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="row">-->
                <!--                                    <h5 class="mb-4 mt-3 col-md-12">Soups <small class="h6 text-black-50">8 ITEMS</small></h5>-->
                <!--                                    <div class="col-md-12">-->
                <!--                                        <div class="bg-white rounded border shadow-sm">-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Tomato Dhania Shorba</h6>-->
                <!--                                                        <p class="text-gray mb-0">$314 - 12" (30 cm)</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Veg Manchow Soup</h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                       <span class="count-number float-right">-->
                <!--                                       <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>-->
                <!--                                       <input class="count-number-input" type="text" value="1" readonly="">-->
                <!--                                       <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>-->
                <!--                                       </span>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-success food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Lemon Coriander Soup</h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Tomato Dhania Shorba</h6>-->
                <!--                                                        <p class="text-gray mb-0">$314 - 12" (30 cm)</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3 border-bottom">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-danger food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Veg Manchow Soup</h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="gold-members p-3">-->
                <!--                                                <a class="btn btn-outline-secondary btn-sm  float-right" href="#">ADD</a>-->
                <!--                                                <div class="media">-->
                <!--                                                    <div class="mr-3"><i class="icofont-ui-press text-success food-item"></i></div>-->
                <!--                                                    <div class="media-body">-->
                <!--                                                        <h6 class="mb-1">Lemon Coriander Soup</h6>-->
                <!--                                                        <p class="text-gray mb-0">$600</p>-->
                <!--                                                    </div>-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
              </div>
              <div
                class="tab-pane fade"
                id="pills-gallery"
                role="tabpanel"
                aria-labelledby="pills-gallery-tab"
              >
                <div id="gallery" class="bg-white rounded shadow-sm p-4 mb-4">
                  <div
                    class="restaurant-slider-main position-relative homepage-great-deals-carousel"
                  >
                    <div class="owl-carousel owl-theme homepage-ad">
                      <div
                        v-for="media in $page.props.product.media"
                        :key="media.id"
                        class="item"
                      >
                        <img class="img-fluid" :src="media.url" />
                      </div>
                    </div>
                    <div
                      class="position-absolute restaurant-slider-pics bg-dark text-white"
                    >
                      1 of {{ $page.props.product.media.length }} Photos
                    </div>
                    <!--                                        <div class="position-absolute restaurant-slider-view-all"><button type="button" class="btn btn-light bg-white">See all Photos</button></div>-->
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-restaurant-info"
                role="tabpanel"
                aria-labelledby="pills-restaurant-info-tab"
              >
                <div id="restaurant-info" class="bg-white rounded shadow-sm p-4 mb-4">
                  <div class="address-map float-right ml-5">
                    <div class="mapouter">
                      <div class="gmap_canvas">
                        <iframe
                          width="300"
                          height="170"
                          id="gmap_canvas"
                          src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=9&ie=UTF8&iwloc=&output=embed"
                          frameborder="0"
                          scrolling="no"
                          marginheight="0"
                          marginwidth="0"
                        ></iframe>
                      </div>
                    </div>
                  </div>
                  <h5 class="mb-4">{{ $t("listing.tabs.product_info") }}</h5>
                  <p class="mb-3">
                    {{ $page.props.product.name }} <br />
                    {{ $page.props.product.desc }}
                  </p>
                  <p class="mb-2 text-black">
                    <i class="icofont-phone-circle text-primary mr-2"></i> +91
                    01234-56789, +91 01234-56789
                  </p>
                  <p class="mb-2 text-black">
                    <i class="icofont-email text-primary mr-2"></i> iamosahan@gmail.com,
                    osahaneat@gmail.com
                  </p>
                  <p class="mb-2 text-black">
                    <i class="icofont-label text-primary mr-2"></i>
                    <span class="badge badge-success">
                      {{ $page.props.product.category.name }}
                    </span>
                  </p>
                  <!--                                    <hr class="clearfix">-->
                  <!--                                    <p class="text-black mb-0">You can also check the 3D view by using our menue map clicking here &nbsp;&nbsp;&nbsp; <a class="text-info font-weight-bold" href="#">Venue Map</a></p>-->
                  <!--                                    <hr class="clearfix">-->
                  <!--                                    <h5 class="mt-4 mb-4">More Info</h5>-->
                  <!--                                    <p class="mb-3">Dal Makhani, Panneer Butter Masala, Kadhai Paneer, Raita, Veg Thali, Laccha Paratha, Butter Naan</p>-->
                  <!--                                    <div class="border-btn-main mb-4">-->
                  <!--                                        <a class="border-btn text-success mr-2" href="#"><i class="icofont-check-circled"></i> Breakfast</a>-->
                  <!--                                        <a class="border-btn text-danger mr-2" href="#"><i class="icofont-close-circled"></i> No Alcohol Available</a>-->
                  <!--                                        <a class="border-btn text-success mr-2" href="#"><i class="icofont-check-circled"></i> Vegetarian Only</a>-->
                  <!--                                        <a class="border-btn text-success mr-2" href="#"><i class="icofont-check-circled"></i> Indoor Seating</a>-->
                  <!--                                        <a class="border-btn text-success mr-2" href="#"><i class="icofont-check-circled"></i> Breakfast</a>-->
                  <!--                                        <a class="border-btn text-danger mr-2" href="#"><i class="icofont-close-circled"></i> No Alcohol Available</a>-->
                  <!--                                        <a class="border-btn text-success mr-2" href="#"><i class="icofont-check-circled"></i> Vegetarian Only</a>-->
                  <!--                                    </div>-->
                </div>
              </div>
              <!--                            <div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab">-->
              <!--                                <div id="book-a-table" class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">-->
              <!--                                    <h5 class="mb-4">Book A Table</h5>-->
              <!--                                    <form>-->
              <!--                                        <div class="row">-->
              <!--                                            <div class="col-sm-6">-->
              <!--                                                <div class="form-group">-->
              <!--                                                    <label>Full Name</label>-->
              <!--                                                    <input class="form-control" type="text" placeholder="Enter Full Name">-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="col-sm-6">-->
              <!--                                                <div class="form-group">-->
              <!--                                                    <label>Email Address</label>-->
              <!--                                                    <input class="form-control" type="text" placeholder="Enter Email address">-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                        </div>-->
              <!--                                        <div class="row">-->
              <!--                                            <div class="col-sm-6">-->
              <!--                                                <div class="form-group">-->
              <!--                                                    <label>Mobile number</label>-->
              <!--                                                    <input class="form-control" type="text" placeholder="Enter Mobile number">-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="col-sm-6">-->
              <!--                                                <div class="form-group">-->
              <!--                                                    <label>Date And Time</label>-->
              <!--                                                    <input class="form-control" type="text" placeholder="Enter Date And Time">-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                        </div>-->
              <!--                                        <div class="form-group text-right">-->
              <!--                                            <button class="btn btn-primary" type="button"> Submit </button>-->
              <!--                                        </div>-->
              <!--                                    </form>-->
              <!--                                </div>-->
              <!--                            </div>-->
              <!--                            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">-->
              <!--                                <div id="ratings-and-reviews" class="bg-white rounded shadow-sm p-4 mb-4 clearfix restaurant-detailed-star-rating">-->
              <!--                              <span class="star-rating float-right">-->
              <!--                              <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>-->
              <!--                              <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>-->
              <!--                              <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>-->
              <!--                              <a href="#"><i class="icofont-ui-rating icofont-2x active"></i></a>-->
              <!--                              <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                              </span>-->
              <!--                                    <h5 class="mb-0 pt-1">Rate this Place</h5>-->
              <!--                                </div>-->
              <!--                                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">-->
              <!--                                    <h5 class="mb-0 mb-4">Ratings and Reviews</h5>-->
              <!--                                    <div class="graph-star-rating-header">-->
              <!--                                        <div class="star-rating">-->
              <!--                                            <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                            <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                            <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                            <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                            <a href="#"><i class="icofont-ui-rating"></i></a>  <b class="text-black ml-2">334</b>-->
              <!--                                        </div>-->
              <!--                                        <p class="text-black mb-4 mt-2">Rated 3.5 out of 5</p>-->
              <!--                                    </div>-->
              <!--                                    <div class="graph-star-rating-body">-->
              <!--                                        <div class="rating-list">-->
              <!--                                            <div class="rating-list-left text-black">-->
              <!--                                                5 Star-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-center">-->
              <!--                                                <div class="progress">-->
              <!--                                                    <div style="width: 56%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">-->
              <!--                                                        <span class="sr-only">80% Complete (danger)</span>-->
              <!--                                                    </div>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-right text-black">56%</div>-->
              <!--                                        </div>-->
              <!--                                        <div class="rating-list">-->
              <!--                                            <div class="rating-list-left text-black">-->
              <!--                                                4 Star-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-center">-->
              <!--                                                <div class="progress">-->
              <!--                                                    <div style="width: 23%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">-->
              <!--                                                        <span class="sr-only">80% Complete (danger)</span>-->
              <!--                                                    </div>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-right text-black">23%</div>-->
              <!--                                        </div>-->
              <!--                                        <div class="rating-list">-->
              <!--                                            <div class="rating-list-left text-black">-->
              <!--                                                3 Star-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-center">-->
              <!--                                                <div class="progress">-->
              <!--                                                    <div style="width: 11%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">-->
              <!--                                                        <span class="sr-only">80% Complete (danger)</span>-->
              <!--                                                    </div>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-right text-black">11%</div>-->
              <!--                                        </div>-->
              <!--                                        <div class="rating-list">-->
              <!--                                            <div class="rating-list-left text-black">-->
              <!--                                                2 Star-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-center">-->
              <!--                                                <div class="progress">-->
              <!--                                                    <div style="width: 2%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">-->
              <!--                                                        <span class="sr-only">80% Complete (danger)</span>-->
              <!--                                                    </div>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                            <div class="rating-list-right text-black">02%</div>-->
              <!--                                        </div>-->
              <!--                                    </div>-->
              <!--                                    <div class="graph-star-rating-footer text-center mt-3 mb-3">-->
              <!--                                        <button type="button" class="btn btn-outline-primary btn-sm">Rate and Review</button>-->
              <!--                                    </div>-->
              <!--                                </div>-->
              <!--                                <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">-->
              <!--                                    <a href="#" class="btn btn-outline-primary btn-sm float-right">Top Rated</a>-->
              <!--                                    <h5 class="mb-1">All Ratings and Reviews</h5>-->
              <!--                                    <div class="reviews-members pt-4 pb-4">-->
              <!--                                        <div class="media">-->
              <!--                                            <a href="#"><img alt="Generic placeholder image" src="/img/user/1.png" class="mr-3 rounded-pill"></a>-->
              <!--                                            <div class="media-body">-->
              <!--                                                <div class="reviews-members-header">-->
              <!--                                          <span class="star-rating float-right">-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating"></i></a>-->
              <!--                                          </span>-->
              <!--                                                    <h6 class="mb-1"><a class="text-black" href="#">Singh Osahan</a></h6>-->
              <!--                                                    <p class="text-gray">Tue, 20 Mar 2020</p>-->
              <!--                                                </div>-->
              <!--                                                <div class="reviews-members-body">-->
              <!--                                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>-->
              <!--                                                </div>-->
              <!--                                                <div class="reviews-members-footer">-->
              <!--                                                    <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 856M</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 158K</a>-->
              <!--                                                    <span class="total-like-user-main ml-2" dir="rtl">-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan" href="#"><img alt="Generic placeholder image" src="/img/user/5.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Singh" href="#"><img alt="Generic placeholder image" src="/img/user/2.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Askbootstrap" href="#"><img alt="Generic placeholder image" src="/img/user/3.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Osahan" href="#"><img alt="Generic placeholder image" src="/img/user/4.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          </span>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                        </div>-->
              <!--                                    </div>-->
              <!--                                    <hr>-->
              <!--                                    <div class="reviews-members pt-4 pb-4">-->
              <!--                                        <div class="media">-->
              <!--                                            <a href="#"><img alt="Generic placeholder image" src="/img/user/6.png" class="mr-3 rounded-pill"></a>-->
              <!--                                            <div class="media-body">-->
              <!--                                                <div class="reviews-members-header">-->
              <!--                                          <span class="star-rating float-right">-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating active"></i></a>-->
              <!--                                          <a href="#"><i class="icofont-ui-rating"></i></a>-->
              <!--                                          </span>-->
              <!--                                                    <h6 class="mb-1"><a class="text-black" href="#">Gurdeep Singh</a></h6>-->
              <!--                                                    <p class="text-gray">Tue, 20 Mar 2020</p>-->
              <!--                                                </div>-->
              <!--                                                <div class="reviews-members-body">-->
              <!--                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>-->
              <!--                                                </div>-->
              <!--                                                <div class="reviews-members-footer">-->
              <!--                                                    <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 88K</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 1K</a>-->
              <!--                                                    <span class="total-like-user-main ml-2" dir="rtl">-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan" href="#"><img alt="Generic placeholder image" src="/img/user/5.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Singh" href="#"><img alt="Generic placeholder image" src="/img/user/2.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Askbootstrap" href="#"><img alt="Generic placeholder image" src="/img/user/3.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          <a data-toggle="tooltip" data-placement="top" title="Osahan" href="#"><img alt="Generic placeholder image" src="/img/user/4.png" class="total-like-user rounded-pill"></a>-->
              <!--                                          </span>-->
              <!--                                                </div>-->
              <!--                                            </div>-->
              <!--                                        </div>-->
              <!--                                    </div>-->
              <!--                                    <hr>-->
              <!--                                    <a class="text-center w-100 d-block mt-4 font-weight-bold" href="#">See All Reviews</a>-->
              <!--                                </div>-->
              <!--                                <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">-->
              <!--                                    <h5 class="mb-4">Leave Comment</h5>-->
              <!--                                    <p class="mb-2">Rate the Place</p>-->
              <!--                                    <div class="mb-4">-->
              <!--                                 <span class="star-rating">-->
              <!--                                 <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                                 <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                                 <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                                 <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                                 <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>-->
              <!--                                 </span>-->
              <!--                                    </div>-->
              <!--                                    <form>-->
              <!--                                        <div class="form-group">-->
              <!--                                            <label>Your Comment</label>-->
              <!--                                            <textarea class="form-control"></textarea>-->
              <!--                                        </div>-->
              <!--                                        <div class="form-group">-->
              <!--                                            <button class="btn btn-primary btn-sm" type="button"> Submit Comment </button>-->
              <!--                                        </div>-->
              <!--                                    </form>-->
              <!--                                </div>-->
              <!--                            </div>-->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <Cart />
          <!--                    <div class="text-center pt-2 mb-4">-->
          <!--                        <img class="img-fluid" src="https://dummyimage.com/352x600/ccc/ffffff.png&text=Google+ads">-->
          <!--                    </div>-->
          <!--                    <div class="text-center pt-2">-->
          <!--                        <img class="img-fluid" src="https://dummyimage.com/352x568/ccc/ffffff.png&text=Google+ads">-->
          <!--                    </div>-->
        </div>
      </div>
    </div>
  </section>
</template>
