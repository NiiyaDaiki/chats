<template>
    <div class="ellipsis-background">
        <div class="ellipsis1"></div>
        <div class="ellipsis2"></div>
        <div class="ellipsis3"></div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.ellipsis-background {
    position: relative;

    @media screen and (min-width: 480px) {
        width: 25%;
        height: 23%;
    }
    @media screen and (min-width: 768px) and (max-width: 1024px) {
        width: 22%;
        height: 23%;
    }
    @media screen and (min-width: 1024px) {
        width: 12%;
        height: 23%;
    }
    transform: rotate(-10deg);
    background-color: rgba(0, 0, 0, 0.288);
    // background-color: white;
    clip-path: polygon(
        0 85%,
        28% 69%,
        34% 79%,
        33% 80%,
        26% 53%,
        89% 43%,
        100% 96%,
        38% 99%,
        36% 89%,
        26% 94%,
        24% 80%
    );
    z-index: 100;
}

.ellipsis1 {
    position: absolute;
    width: 7%;
    height: 7%;
    left: 100% - 55%;
    top: 100% - 33%;
    clip-path: circle(50% at 50% 50%);
    background-color: rgb(202, 11, 11);
    z-index: 110;
    animation: flash1 2s  infinite;
}
.ellipsis2 {
    position: absolute;
    width: 7%;
    height: 7%;
    left: 100% - 40%;
    top: 100% - 30%;
    clip-path: circle(50% at 50% 50%);
    background-color: rgb(202, 11, 11);
    z-index: 120;
    animation: flash2 2s  infinite;
}
.ellipsis3 {
    position: absolute;
    width: 7%;
    height: 7%;
    left: 100% - 25%;
    top: 100% - 28%;
    clip-path: circle(50% at 50% 50%);
    background-color: rgb(202, 11, 11);
    z-index: 130;
    animation: flash3 2s  infinite;
}

@keyframes flash1 {
    0% {
        opacity: 0;
    }
    19% {
        opacity: 0;
    }
    20% {
        opacity: 1;
    }
    60%{
        opacity: 1;
    }
    66%{
        opacity: 1;
    }
    67%{
        opacity: 0;
    }
    100%{
        opacity: 0;
    }
}

@keyframes flash2 {
    0% {
        opacity: 0;
    }
    29% {
        opacity: 0;
    }
    30% {
        opacity: 1;
    }
    71%{
        opacity: 1;
    }
    72%{
        opacity: 0;
    }
    100%{
        opacity: 0;
    }

}

@keyframes flash3 {
    0% {
        opacity: 0;
    }
    39% {
      opacity: 0;
    }
    40% {
        opacity: 1;
    }
    76%{
        opacity: 1;
    }
    77%{
        opacity: 0;
    }
    100%{
        opacity: 0;
    }

}
</style>
