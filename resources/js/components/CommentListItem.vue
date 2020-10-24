<template>
    <div :class="highlight" :id="`comment-${comment.id}`" class="d-flex">
        <img class="rounded shadow-sm mr-2" height="34px" width="34px" :src="'/upload/avatars/'+comment.user.avatar" :alt="comment.user.name">
        <div class="flex-grow-1">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-2 text-secondary">
                    <a :href="comment.user.link"><strong>{{ comment.user.name }}</strong></a>
                    {{ comment.body }}
                </div>
            </div>
            <small class="badge badge-pill badge-primary float-right py-1 px-2 mt-1" dusk="comment-likes-count">
                <i class="fa fa-thumbs-up"></i>
                {{ comment.likes_count }}
            </small>
            <like-btn
                dusk="comment-unlike-btn"
                :url="`/comments/${comment.id}/likes`"
                :model="comment"
                class="comment-like-btn"
            ></like-btn>
        </div>
    </div>
</template>

<script>
import LikeBtn from "./LikeBtn";

export default {
    components: { LikeBtn },
    props: {
        comment: {
            type: Object,
            required: true
        }
    },
    mounted() {
        Echo.channel(`comments.${this.comment.id}.likes`)
            .listen('ModelLiked', comment => {
                this.comment.likes_count++;
            });

        Echo.channel(`comments.${this.comment.id}.likes`)
            .listen('ModelUnliked', comment => {
                this.comment.likes_count--;
            });
    },
    computed: {
        highlight() {
            if (window.location.hash === `#comment-${this.comment.id}`) {
                return 'highlight';
            }
        }
    }
}
</script>

<style scoped>
    .highlight {
        background-color: #ececec;
        padding: 10px;
        border-left: 4px solid #32CD32;
    }
</style>