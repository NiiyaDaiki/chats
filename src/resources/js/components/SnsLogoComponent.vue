<template>
    <div class="sns-logo-wrapper">
        <div class="letter1-s-black">
            <div class="letter1-s-red"></div>
        </div>
        <div class="letter2-n-black">
            <div class="letter2-n-white"></div>
        </div>
        <div class="letter3-s-black">
            <div class="letter3-s-white"></div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.sns-logo-wrapper {
    /* position: absolute; */
    display: flex;
    // transform: rotate(-5deg);

    .letter1-s-black {
        display: flex;
        justify-content: center;
        align-items: center;
        transform: rotate(-10deg);

        left: -2.5%;
        top: 22%;
        position: absolute;
        width: 26%;
        height: 26%;
        background-color: black;
        clip-path: polygon(
            30% -3%,
            65% 8%,
            73% 38%,
            75% 45%,
            85% 75%,
            45% 100%,
            17% 75%,
            28% 62%,
            19% 55%,
            12% 35%
        );
        z-index: 100;
    }
    .letter1-s-red {
        position: relative;
        width: 90%;
        height: 90%;
        background-color: red;
        clip-path: polygon(
            33% 0%,
            65% 10%,
            45% 38%,
            65% 45%,
            75% 75%,
            43% 96%,
            23% 80%,
            46% 62%,
            19% 55%,
            10% 35%
        );
        z-index: 100;
    }
    .letter2-n-black {
        display: flex;
        justify-content: center;
        align-items: center;
        transform: rotate(-30deg);

        left: 13%;
        top: 14%;
        position: absolute;
        width: 21.5%;
        height: 21.5%;
        background-color: black;
        clip-path: polygon(
            0% 100%,
            5% 91%,
            0 9%,
            21% 19%,
            22% 3%,
            41% 3%,
            42% 0%,
            85% 0%,
            79% 100%,
            43% 100%,
            43% 100%,
            27% 100%,
            30% 100%
        );
        z-index: 100;
    }
    .letter2-n-white {
        position: relative;
        width: 90%;
        height: 90%;
        background-color: white;
        clip-path: polygon(
            0% 100%,
            5% 91%,
            0 25%,
            21% 24%,
            22% 41%,
            41% 55%,
            42% 2%,
            75% 0%,
            69% 100%,
            43% 100%,
            43% 84%,
            24% 65%,
            30% 100%
        );
    }
    .letter3-s-black {
        display: flex;
        justify-content: center;
        align-items: center;
        transform: rotate(-10deg);

        left: 24%;
        top: 4%;
        position: absolute;
        width: 26%;
        height: 26%;
        background-color: black;
        clip-path: polygon(
            33% 0%,
            75% 10%,
            63% 38%,
            75% 40%,
            78% 78%,
            28% 110%,
            17% 75%,
            18% 62%,
            17% 55%,
            10% 35%
        );
        z-index: 100;
    }
    .letter3-s-white {
        position: relative;
        width: 90%;
        height: 90%;
        background-color: white;

        clip-path: polygon(
            33% 0%,
            65% 10%,
            45% 38%,
            65% 45%,
            75% 75%,
            43% 92%,
            23% 80%,
            46% 62%,
            19% 55%,
            10% 35%
        );
        z-index: 10;
    }
}
</style>
