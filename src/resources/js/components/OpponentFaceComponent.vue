<template>
    <div class="opponent-face-back-black">
        <div class="opponent-face-back-white">
            <div class="opponent-face-back-orange"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["chat"]
};
</script>

<style lang="scss">
.opponent-face-back-black {
    // display: flex;
    // justify-content: flex-start;
    // position: relative;
    // position: absolute;
    // bottom: 0;
    align-self: flex-end;
    align-items: flex-end;
    @media screen and (max-width: 480px) {
        width: 30%;
    }
    @media screen and (min-width: 480px) and (max-width: 1024px) {
        width: 20%;
    }
    @media screen and (min-width: 1024px) {
        width: 15%;
    }

    height: 70px;
    background-color: black;
    clip-path: polygon(0 0, 95% 15%, 93% 79%, 20% 100%);
    z-index: 10;
}

.opponent-face-back-white {
    width: 100%;
    height: 100%;
    background-color: white;

    clip-path: polygon(10% 8%, 91% 20%, 91% 74%, 25% 88%);
    z-index: 20;
}

.opponent-face-back-orange {
    width: 100%;
    height: 100%;
    background-color: orange;

    clip-path: polygon(15% 17%, 89% 21%, 88% 70%, 27% 83%);
    z-index: 30;
}
</style>
