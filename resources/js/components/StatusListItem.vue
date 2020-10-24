<template>
    <div class="card border-0 mb-3 shadow-sm">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mb-3">
                    <img class="rounded-circle mr-3 shadow-sm" width="40px" :src="'/upload/avatars/'+status.user.avatar" :alt="status.user.name">
                    <div>
                        <h5 class="mb-1"><a :href="status.user.link" v-text="status.user.name"></a></h5>
                        <div class="small text-muted" v-text="status.ago"></div>
                    </div>
                </div>
                <iframe height="300" src="https://www.mapquest.com/embed/directions/from/near--25.321861,-57.544598/to/near--25.286664,-57.611808?center=-25.30437572365438,-57.57689100000002&zoom=13&maptype=map"></iframe>
                <div class="row">
                    <div class="col-6">
                        <strong>Origen: </strong><p class="card-text text-secondary" v-text="status.fields.origen"></p>
                    </div>
                    <div class="col-6">
                        <strong>Destino: </strong><p class="card-text text-secondary" v-text="status.fields.destino"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong>Cantidad de personas permitidas: </strong><p class="card-text text-secondary" v-text="status.fields.cantidad"></p>
                    </div>
                    <div class="col-6">
                        <strong>Comentario: </strong><p class="card-text text-secondary" v-text="status.fields.comentario"></p>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 d-flex justify-content-between align-items-center">
                <like-btn
                    dusk="like-btn"
                    :url="`/statuses/${status.id}/likes`"
                    :model="status"
                ></like-btn>
                <div class="text-secondary mr-2">
                    <i class="far fa-thumbs-up"></i>
                    <span dusk="likes-count">{{ status.likes_count }}</span>
                </div>
            </div>

            <div class="card-footer pb-0" v-if="isAuthenticated || status.comments.length">
                <comment-list
                    :comments="status.comments"
                    :status-id="status.id"
                ></comment-list>
                <comment-form
                    :status-id="status.id"
                ></comment-form>
            </div>
        </div>
</template>

<script>
import LikeBtn from './LikeBtn'
import CommentList from './CommentList'
import CommentForm from './CommentForm'
export default {
    props: { 
        status: {
            type: Object,
            required: true
        }
    },
    components: { LikeBtn, CommentList, CommentForm },
    mounted() {
        Echo.channel(`statuses.${this.status.id}.likes`)
            .listen('ModelLiked', e => {
                this.status.likes_count++;
            });

        Echo.channel(`statuses.${this.status.id}.likes`)
            .listen('ModelUnliked', e => {
                this.status.likes_count--;
            });
    },
}
</script>

<style scoped>

</style>