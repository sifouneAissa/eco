<template>
  <!-- comment-area -->
  <div class="ltn__comment-area mb-50">
    <h4 class="title-2">03 Comments</h4>
    <div class="ltn__comment-inner">
      <ul>
        <li>
          <div class="ltn__comment-item clearfix">
            <div class="ltn__commenter-img">
              <img src="img/testimonial/1.jpg" alt="Image" />
            </div>
            <div class="ltn__commenter-comment">
              <h6><a href="#">Adam Smit</a></h6>
              <span class="comment-date">20th May 2020</span>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis
                fugit corporis iste magnam ratione.
              </p>
              <a href="#" class="ltn__comment-reply-btn"
                ><i class="icon-reply-1"></i>Reply</a
              >
            </div>
          </div>
          <ul>
            <li>
              <div class="ltn__comment-item clearfix">
                <div class="ltn__commenter-img">
                  <img src="img/testimonial/3.jpg" alt="Image" />
                </div>
                <div class="ltn__commenter-comment">
                  <h6><a href="#">Adam Smit</a></h6>
                  <span class="comment-date">21th May 2020</span>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus,
                    omnis fugit corporis iste magnam ratione.
                  </p>
                  <a href="#" class="ltn__comment-reply-btn"
                    ><i class="icon-reply-1"></i>Reply</a
                  >
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <div class="ltn__comment-item clearfix">
            <div class="ltn__commenter-img">
              <img src="img/testimonial/4.jpg" alt="Image" />
            </div>
            <div class="ltn__commenter-comment">
              <h6><a href="#">Adam Smit</a></h6>
              <span class="comment-date">25th May 2020</span>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis
                fugit corporis iste magnam ratione.
              </p>
              <a href="#" class="ltn__comment-reply-btn"
                ><i class="icon-reply-1"></i>Reply</a
              >
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <hr />
  <!-- comment-reply -->
  <div class="ltn__comment-reply-area ltn__form-box mb-60">
    <h4 class="title-2">Post Comment</h4>
    <form action="#">
      <div class="input-item input-item-textarea ltn__custom-icon">
        <textarea placeholder="Type your comments...."></textarea>
      </div>
      <div class="input-item input-item-name ltn__custom-icon">
        <input type="text" placeholder="Type your name...." />
      </div>
      <div class="input-item input-item-email ltn__custom-icon">
        <input type="email" placeholder="Type your email...." />
      </div>
      <div class="input-item input-item-website ltn__custom-icon">
        <input type="text" name="website" placeholder="Type your website...." />
      </div>
      <label class="mb-0 input-info-save"
        ><input type="checkbox" name="agree" /> Save my name, email, and website in this
        browser for the next time I comment.</label
      >
      <div class="btn-wrapper">
        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
          <i class="far fa-comments"></i> Post Comment
        </button>
      </div>
    </form>
  </div>
</template>
