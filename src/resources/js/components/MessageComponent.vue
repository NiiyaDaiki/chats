<template>
    <div class="card card-default chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session.block}">
                {{friend.name}}
                <span v-if="isTyping">が入力中...</span>
                <span v-if="session.block">(ブロック中)</span>
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
                        v-if="session.block && can"
                        @click.prevent="unBlock"
                    >ブロック解除</a>
                    <a
                        class="dropdown-item"
                        href="#"
                        @click.prevent="block"
                        v-if="!session.block"
                    >ブロック</a>
                    <a class="dropdown-item" href="#" @click.prevent="clear">メッセージ履歴削除</a>
                </div>
            </div>
            <!-- Option Button End-->
        </div>
        <div class="card-body" v-chat-scroll>
            <!-- <p
                class="card-text"
                :class="{'text-right':chat.type == 0, 'text-success':chat.read_at != null }"
                v-for="chat in chats"
                :key="chat.id"
            >
                {{chat.message}}
                <br />
                <span style="font-size:8px">{{chat.read_at}}</span>
            </p>
            -->
            <template v-for="chat in chats">
                <balloon-component v-if="chat.type == 0" :key="chat.id" :chat="chat"></balloon-component>
                <opponent-balloon-component v-else :key="chat.id" :chat="chat"></opponent-balloon-component>
            </template>
        </div>
        <!-- <form class="card-footer" @submit.prevent="send"> -->
        <form class="card-footer" @keyup.ctrl.13="send">
            <div class="form-group">
                <textarea
                    type="text"
                    class="form-control"
                    :placeholder="session.block ? 'ブロック中のため入力できません':'メッセージを入力してください'"
                    :disabled="session.block"
                    v-model="message"
                ></textarea>
                <span class="f-right">Ctrl + Enterでメッセージを送信</span>
            </div>
        </form>
    </div>
</template>

<script>
import BalloonComponent from "./BalloonComponent";
import OpponentBalloonComponent from "./OpponentBalloonComponent";

export default {
    props: ["friend"],
    data() {
        return {
            chats: [],
            message: null,
            isTyping: false
        };
    },
    computed: {
        session() {
            return this.friend.session;
        },
        can() {
            return this.session.blocked_by == auth.id;
        }
    },
    watch: {
        message(value) {
            if (value) {
                Echo.private(`Chat.${this.friend.session.id}`).whisper(
                    "typing",
                    {
                        name: auth.name
                    }
                );
            }
        }
    },
    methods: {
        send() {
            if (this.message) {
                this.pushToChats(this.message);
                axios
                    .post(`/send/${this.friend.session.id}`, {
                        content: this.message,
                        to_user: this.friend.id
                    })
                    .then(
                        res => (this.chats[this.chats.length - 1].id = res.data)
                    );
                this.message = null;
            }
        },
        pushToChats(message) {
            this.chats.push({
                message: message,
                type: 0,
                read_at: null,
                sent_at: "Just Now"
            });
        },
        close() {
            this.$emit("close");
        },
        clear() {
            axios
                .post(`session/${this.friend.session.id}/clear`)
                .then(res => (this.chats = []));
        },
        block() {
            this.session.block = true;
            axios
                .post(`/session/${this.friend.session.id}/block`)
                .then(res => (this.session.blocked_by = auth.id));
        },
        unBlock() {
            this.session.block = false;
            axios
                .post(`/session/${this.friend.session.id}/unblock`)
                .then(res => (this.session.blocked_by = null));
        },
        getAllMessages() {
            axios
                .post(`/session/${this.friend.session.id}/chats`)
                .then(res => (this.chats = res.data.data));
        },
        read() {
            axios.post(`/session/${this.friend.session.id}/read`);
        }
    },
    created() {
        this.read();

        this.getAllMessages();

        Echo.private(`Chat.${this.friend.session.id}`).listen(
            "PrivateChatEvent",
            e => {
                this.friend.session.open ? this.read() : "";
                this.chats.push({
                    message: e.content,
                    type: 1,
                    sent_at: "Just Now"
                });
            }
        );

        Echo.private(`Chat.${this.friend.session.id}`).listen(
            "MsgReadEvent",
            e =>
                this.chats.forEach(chat =>
                    chat.id == e.chat.id ? (chat.read_at = e.chat.read_at) : ""
                )
        );

        Echo.private(`Chat.${this.friend.session.id}`).listen(
            "BlockEvent",
            e => (this.session.block = e.blocked)
        );

        Echo.private(`Chat.${this.friend.session.id}`).listenForWhisper(
            "typing",
            e => {
                this.isTyping = true;
                setTimeout(() => {
                    this.isTyping = false;
                }, 2000);
            }
        );
    },
    components: {
        BalloonComponent,
        OpponentBalloonComponent
    }
};
</script>

<style>
.f-right {
    float: right;
}
.chat-box {
    height: 400px;
}
.card-body {
    overflow-y: scroll;
    background-color: rgb(202, 11, 11);
    min-height: 400px !important;
    border: 5px solid;
    border-color: black;
}
.card-text {
    font-size: 20px;
    line-height: 18px;
}

.text-al-end {
    text-align: end;
}
</style>
