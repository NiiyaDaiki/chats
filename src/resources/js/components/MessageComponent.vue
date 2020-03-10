<template>
    <div class="card card-default chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                {{friend.name}}
                <span v-if="session_block">(blocked)</span>
            </b>
            <!-- Close Button -->
            <a @click.prevent="close">
                <i class="fas fa-times float-right" aria-hidden="true"></i>
            </a>
            <!-- Close Button End-->

            <!-- Option Button -->
            <div class="dropdown float-right mr-4">
                <a
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <i class="fas fa-ellipsis-v float-right mr-4" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a
                        class="dropdown-item"
                        href="#"
                        v-if="session_block"
                        @click.prevent="unBlock"
                    >UnBlock</a>
                    <a class="dropdown-item" href="#" @click.prevent="block" v-else>Block</a>
                    <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>
                </div>
            </div>
            <!-- Option Button End-->
        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">{{chat.message}}</p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Write your message here"
                    :disabled="session_block"
                />
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["friend"],
    data() {
        return {
            chats: [],
            session_block: false
        };
    },
    methods: {
        send() {
            console.log("yeahhh");
        },
        close() {
            this.$emit("close");
        },
        clear() {
            this.chats = [];
        },
        block() {
            this.session_block = true;
        },
        unBlock() {
            this.session_block = false;
        }
    },
    created() {
        this.chats.push(
            { message: "How are you1" },
            { message: "How are you2" },
            { message: "How are you3" },
            { message: "How are you4" },
            { message: "How are you5" },
            { message: "How are you6" },
            { message: "How are you7" },
            { message: "How are you8" },
            { message: "How are you9" },
            { message: "How are you10" },
            { message: "How are you11" },
            { message: "How are you12" },
            { message: "How are you13" },
            { message: "I am at bottom" }
        );
    }
};
</script>

<style>
.chat-box {
    height: 400px;
}
.card-body {
    overflow-y: scroll;
}
</style>
