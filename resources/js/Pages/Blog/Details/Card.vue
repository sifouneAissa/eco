<script>
import BlogCard from "@/Pages/Blog/BlogCard.vue";
import commentSection from "@/Pages/Common/comment.vue";

export default {
  name: "BlogDetails.vue",
  components: {
    BlogCard,
    commentSection,
  },
};
</script>

<template>
  <div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <img :src="$page.props.blog.fimage" alt="Image" />
          <div class="ltn__blog-details-wrap">
            <div class="ltn__page-details-inner ltn__blog-details-inner">
              <h2 class="ltn__blog-title">{{ $page.props.blog.title }}</h2>
              <div class="ltn__blog-meta">
                <ul>
                  <li v-if="$page.props.blog.user" class="ltn__blog-author">
                    <a href="#"
                      ><img src="img/blog/author.jpg" alt="#" />{{ $t("blog.by") }}
                      {{ $page.props.blog.user.name }}</a
                    >
                  </li>
                  <li class="ltn__blog-date">
                    <i class="far fa-calendar-alt"></i>{{ $page.props.blog.created }}
                  </li>
                  <li>
                    <a href="#"
                      ><i class="far fa-comments"></i>35 {{ $t("blog.comments") }}</a
                    >
                  </li>
                </ul>
              </div>
              <div v-html="$page.props.blog.blog"></div>
            </div>
            <hr />
            <!-- prev-next-btn -->
            <!-- <div class="ltn__prev-next-btn row mb-50">
              <div class="blog-prev col-lg-6">
                <h6>Prev Post</h6>
                <h3 class="ltn__blog-title"><a href="#">Tips On Minimalist</a></h3>
              </div>
              <div class="blog-prev blog-next text-right col-lg-6">
                <h6>Next Post</h6>
                <h3 class="ltn__blog-title"><a href="#">Less Is More</a></h3>
              </div>
            </div>
            <hr /> -->
            <!-- related-post -->
            <div class="related-post-area mb-50">
              <h4 class="title-2">{{ $t("blog.related") }}</h4>
              <div class="row">
                <BlogCard
                  v-for="model in $page.props.blogs"
                  :key="model.id"
                  :model="model"
                />
              </div>
            </div>

            <commentSection />
          </div>
        </div>
        <div class="col-lg-4">
          <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
            <!-- Author Widget (2) -->
            <!-- <div class="widget ltn__author-widget ltn__author-widget-2">
              <h4 class="ltn__widget-title">About Me</h4>
              <div class="ltn__author-widget-inner">
                <img src="/img/blog/author-2.jpg" alt="Image" />
                <h5>Rosalina D. Willaimson</h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis
                  distinctio, odio, eligendi suscipit reprehenderit atque.
                </p>
                <div class="ltn__social-media">
                  <ul>
                    <li>
                      <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li>
                      <a href="#" title="Behance"><i class="fab fa-behance"></i></a>
                    </li>
                    <li>
                      <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> -->
            <!-- Popular Post Widget -->
            <div class="widget ltn__popular-post-widget">
              <h4 class="ltn__widget-title">{{ $t("blog.popular") }}</h4>
              <ul>
                <li v-for="model in $page.props.blogs" :key="model.id">
                  <div class="popular-post-widget-item clearfix">
                    <div class="popular-post-widget-img">
                      <a :href="route('blog.show', { id: model.id })"
                        ><img :src="model.fimage" alt="#"
                      /></a>
                    </div>
                    <div class="popular-post-widget-brief">
                      <h6>
                        <a :href="route('blog.show', { id: model.id })">{{
                          model.title
                        }}</a>
                      </h6>
                      <div class="ltn__blog-meta">
                        <ul>
                          <li class="ltn__blog-date">
                            <a :href="route('blog.show', { id: model.id })"
                              ><i class="far fa-calendar-alt"></i>{{ model.created }}</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Social Media Widget -->
            <div class="widget ltn__social-media-widget">
              <h4 class="ltn__widget-title">{{ $t("blog.news") }}</h4>
              <div class="ltn__social-media-2">
                <ul>
                  <li>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Behance"><i class="fab fa-behance"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Instagram Widget -->
            <!-- <div class="widget ltn__instagram-widget">
              <h4 class="ltn__widget-title">Instagram Feeds</h4>
              <div class="ltn__instafeed ltn__instafeed-grid insta-grid-gutter"></div>
            </div> -->
            <!-- Banner Widget -->
            <div class="widget ltn__banner-widget">
              <a :href="route('listing')"
                ><img src="/img/banner/12.png" alt="Banner Image"
              /></a>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</template>
