<template>
    <div id="overlay">
        <div id="content" @click="stopEvent()">
            <p>画像アップロード</p>

            <div class="form-group">
                <input
                    class="form-control-file"
                    type="file"
                    name="image"
                    @change="fileSelected"
                />
            </div>
            <div class="form-group">
                <input
                    class="btn btn-info form-control"
                    type="submit"
                    value="アップロード"
                    @click="uploadImage()"
                />
            </div>
            <p v-if="beforeUpload">{{ this.text }}</p>
            <p v-if="success" class="text-success">{{ this.successText }}</p>
            <p v-if="failure" class="text-danger">{{ this.failureText }}</p>
            <button class="btn btn-secondary" @click="closeEvent()">
                close
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            fileInfo: [],
            text: "画像を選択してアップロードしてください。",
            beforeUpload: true,
            success: false,
            successText: "アップロードに成功しました！",
            failure: false,
            failureText: "アップロードに失敗しました..."
        };
    },
    methods: {
        closeEvent() {
            this.$emit("close");
        },
        stopEvent() {
            event.stopPropagation();
        },
        fileSelected(event) {
            this.fileInfo = event.target.files[0];
        },
        uploadImage() {
            const formData = new FormData();
            formData.append("file", this.fileInfo);
            axios
                .post(`/user-icon/${auth.id}/upload`, formData)
                .then(res => {
                    this.success = true;
                    if (this.failure) {
                        this.failure = false;
                    }

                    // TODO 相手にリアルタイムに画像反映
                    // Echo.private(`Chat.${this.friendIcon.id}`).listen(
                    //     "FriendIconEvent",
                    //     e => {
                    //         console.log(e);
                    //         this.friendIcon = e.friendIcon;
                    //     }
                    // );
                })
                .catch(error => {
                    this.failure = true;
                    if (this.success) {
                        this.success = false;
                    }
                })
                .finally(res => (this.beforeUpload = false));
        }
    }
};
</script>

<style>
#overlay {
    /* 要素を重ねた時の順番 */
    z-index: 2000;

    /* 画面全体を覆う設定 */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);

    /* 画面の中央に要素を表示させる設定 */
    display: flex;
    align-items: center;
    justify-content: center;
}

#content {
    z-index: 200;
    width: 50%;
    padding: 1em;
    background: #fff;
}
</style>
