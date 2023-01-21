<template>
  <div class="bg-white card mb-4 order-list shadow-sm">
    <div class="gold-members p-4">
      <a href="#">
        <div class="media">
          <!--                    <img class="mr-4" :src="model.fimage" alt="Generic placeholder image">-->
          <div class="media-body">
            <span class="float-right text-info"
              >{{ model.delivered_date }}<i class="icofont-check-circled text-success"></i
            ></span>
            <h6 class="mb-2">
              <a href="#" class="text-black">{{ model.names }} </a>
            </h6>
            <p class="text-gray mb-1">
              <i class="icofont-location-arrow"></i>
              {{ model.user_address.address_line_1 }},{{
                model.user_address.address_line_2
              }}, {{ model.user_address.city }}, {{ model.user_address.country }}
            </p>
            <p class="text-gray mb-3">
              <i class="icofont-list"></i> {{ $t("account.orders.order") }}
              {{ model.order_number }} <i class="icofont-clock-time ml-2"></i>
              {{ model.delivered_date }}
            </p>
            <p class="text-dark">
              {{ model.qnames }}
              <span
                :class="
                  'badge badge-pill ' +
                  (model.payment_detail.status === 'paid'
                    ? 'badge-success'
                    : 'badge-warning')
                "
                >{{
                  model.payment_detail.status === "paid"
                    ? $t("account.orders.paid")
                    : $t("account.orders.unpaid")
                }}</span
              >
            </p>
            <hr />
            <!--                        <div class="float-right">-->
            <!--                            <a class="btn btn-sm btn-outline-primary" href="#"><i class="icofont-headphone-alt"></i> HELP</a>-->
            <!--                            <a class="btn btn-sm btn-primary" href="#"><i class="icofont-refresh"></i> REORDER</a>-->
            <!--                        </div>-->
            <p class="mb-0 text-black text-primary pt-2">
              <span class="text-black font-weight-bold">
                {{ $t("account.orders.total") }}:</span
              >
              {{ $page.props.currency_code }} {{ model.price }}
            </p>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<script setup>
defineProps({
  model: Object,
});
</script>

<style scoped></style>
