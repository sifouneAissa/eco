<template>
  <section class="restaurant-detailed-banner">
    <div class="text-center">
      <img
        class="img-fluid cover"
        src="https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg"
      />
    </div>
    <div class="restaurant-detailed-header">
      <div class="container">
        <div class="row d-flex align-items-end">
          <div class="col-md-8">
            <div class="restaurant-detailed-header-left">
              <img
                class="img-fluid mr-3 float-left"
                alt="osahan"
                src="https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg"
              />
              <h2 class="text-white">{{ $page.props.blog.title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
