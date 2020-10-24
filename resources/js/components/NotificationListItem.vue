<template>
    <div class="dropdown-item d-flex align-items-center"
        :class="isRead ? '' : 'bg-light'"
    >
        <a :dusk="notification.id"
           :href="notification.data.link"
           class="dropdown-item"
        >{{ notification.data.message }}</a>
        <button v-if="isRead"
            @click.stop="markAsUnread"
            :dusk="`mark-as-unread-${notification.id}`"
            class="btn btn-link mr-2"
            >
            <i class="far fa-circle"></i>
            <span class="position-absolute bg-dark text-white ml-2 py-1 px-3 rounded">Marcar como NO leída</span>
        </button>
        <button v-else 
            @click.stop="markAsRead"
            :dusk="`mark-as-read-${notification.id}`"
            class="btn btn-link mr-2"
            >
            <i class="fas fa-circle"></i>
            <span class="position-absolute bg-dark text-white ml-2 py-1 px-3 rounded">Marcar como leída</span>
        </button>
    </div>
</template>

<script>
export default {
    props: {
        notification: Object
    },
    data() {
        return {
            isRead: !! this.notification.read_at // el Simbolo !! convierte el valor por boolean
        }
    },
    methods: {
        markAsRead() {
            axios.post(`/read-notifications/${this.notification.id}`)
                .then(res => {
                    this.isRead = true;
                    EventBus.$emit('notification-read');
                })
        },
        markAsUnread() {
            axios.delete(`/read-notifications/${this.notification.id}`)
                .then(res => {
                    this.isRead = false;
                    EventBus.$emit('notification-unread');
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    button > span {
        display: none;
        width: fit-content;
    }
    button i {
        &:hover {
            & + span {
                display: inline;
            }
        }
    }
</style>