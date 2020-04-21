<template>
    <div id="overlay">
        <div id="content" @click="stopEvent()">
            <p>画像アップロード</p>

            <input type="file" name="image" v-on:change="fileSelected" />
            <input type="submit" value="アップロード" @click="uploadImage()" />
            <button @click="closeEvent()">close</button>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            fileInfo: []
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
                .then(res => console.log(res))
                .catch(error => console.log(error));
        }
    }
};
</script>

<style>
#overlay {
    /*　要素を重ねた時の順番　*/
    z-index: 100;

    /*　画面全体を覆う設定　*/
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);

    /*　画面の中央に要素を表示させる設定　*/
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
