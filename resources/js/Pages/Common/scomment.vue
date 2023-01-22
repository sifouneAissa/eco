<template>
    <ul v-if="children">
        <li v-for="child in children" :key="child.id">
            <div class="ltn__comment-item clearfix">
                <div class="ltn__commenter-img">
                    <img v-if="child.commenter" :src="child.commenter.profile_photo_url" alt="Image" />
                    <img v-else :src="'https://ui-avatars.com/api/?name='+child.guest_name[0]+'&color=7F9CF5&background=EBF4FF'" alt="Image" />
                </div>
                <div class="ltn__commenter-comment">
                    <h6><a href="#">{{child.uname ? child.uname : child.guest_name}}</a></h6>
                    <span class="comment-date">{{child.date}}</span>
                    <p>
                        {{child.comment}}
                    </p>
<!--                    <a href="#" class="ltn__comment-reply-btn"-->
<!--                    ><i class="icon-reply-1"></i>Reply</a-->
<!--                    >-->
                </div>
            </div>
            <scomment :children="child.children" />
        </li>
    </ul>
</template>
<script >
    export default {
        props : [
            'children'
        ]
    }

</script>
