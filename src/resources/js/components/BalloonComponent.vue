<template>
    <div class="wrapper">
        <div class="message-window">
            <div class="message-area">
                <div class="content">
                    <div class="arrow-white"></div>
                    <div class="arrow-black"></div>

                    <div class="background-white"></div>
                    <div class="background-black"></div>
                    <div class="text-area">
                        <div
                            class="prewrap break-word"
                            :class="{'text-success':chat.read_at != null }"
                        >{{chat.message}}</div>
                        <div class="ex-small text-al-end">{{chat.read_at}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["chat"]
};
</script>

<style lang="scss">
body {
    font-family: "Kosugi Maru", sans-serif !important;
}

.ex-small {
    font-size: 60%;
}

.text-al-end {
    text-align: end;
}

.prewrap {
    white-space: pre-wrap;
}

.break-word {
    word-wrap: break-word;
}

.wrapper {
    width: 100%;
}
.message-window {
    width: fit-content;
    position: relative;

    .message-area {
        right: 20px;

        > .content {
            position: relative;

            .arrow-white {
                background-color: black;
                position: absolute;
                width: 25px;
                height: 25px;
                bottom: 20px;
                right: -13px;
                // z-index: -20;
                z-index: 30;

                clip-path: polygon(
                    38% 43%,
                    45% 8%,
                    100% 71%,
                    56% 57%,
                    45% 100%,
                    0 73%,
                    0 8%
                );
                animation-name: arrowWhiteAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .arrow-black {
                background-color: white;
                position: absolute;
                width: 30px;
                height: 20px;
                bottom: 22px;
                right: -10px;

                // z-index: 10;
                z-index: 40;

                clip-path: polygon(
                    38% 43%,
                    44% 19%,
                    100% 71%,
                    56% 57%,
                    47% 80%,
                    0 73%,
                    0 26%
                );

                animation-name: arrowBlackAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .background-white {
                background-color: black;
                position: absolute;
                width: 100%;
                height: 100%;
                left: 3px;
                // z-index: 40;
                z-index: 10;

                clip-path: polygon(0 0, 90% 0, 100% 87%, 10% 100%);

                animation-name: backgroundWhiteAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .background-black {
                background-color: white;
                position: absolute;
                right: 5px;

                width: calc(100% - 25px);
                height: calc(100% - 12px);
                margin-left: 20px;
                margin-right: 5px;
                margin-top: 5px;
                margin-bottom: 7px;

                // z-index: 30;
                z-index: 50;

                clip-path: polygon(0 0, 93% 0, 100% 87%, 8% 100%);

                animation-name: backgroundBlackAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }
            .text-area {
                color: black;
                font-size: 20px;
                margin-left: 50px;
                margin-right: 5px;
                margin-top: 5px;
                margin-bottom: 7px;

                padding-left: 30px;
                padding-right: 30px;
                padding-top: 15px;
                padding-bottom: 20px;

                line-height: 1.2em;
                position: inherit;
                z-index: 60;
            }
        }
    }
    @keyframes arrowWhiteAnimation {
        0% {
            clip-path: polygon(
                38% 43%,
                45% 8%,
                100% 71%,
                56% 57%,
                45% 100%,
                0 73%,
                0 8%
            );
        }
        25% {
            clip-path: polygon(
                38% 43%,
                45% 8%,
                100% 71%,
                56% 57%,
                45% 100%,
                0 73%,
                0 8%
            );
        }
        50% {
            clip-path: polygon(
                38% 43%,
                45% 8%,
                100% 71%,
                56% 57%,
                45% 100%,
                0 73%,
                0 8%
            );
        }
        75% {
            clip-path: polygon(
                38% 43%,
                45% 8%,
                100% 71%,
                56% 57%,
                45% 100%,
                0 73%,
                0 8%
            );
        }
        100% {
            clip-path: polygon(
                38% 43%,
                45% 8%,
                100% 71%,
                56% 57%,
                45% 100%,
                0 73%,
                0 8%
            );
        }
    }
    @keyframes arrowBlackAnimation {
        0% {
            clip-path: polygon(
                38% 43%,
                44% 19%,
                100% 71%,
                56% 57%,
                47% 80%,
                0 73%,
                0 26%
            );
        }
        25% {
            clip-path: polygon(
                38% 43%,
                43% 19%,
                100% 72%,
                56% 57%,
                47% 81%,
                0 72%,
                0 26%
            );
        }
        50% {
            clip-path: polygon(
                38% 43%,
                44% 19%,
                99% 71%,
                56% 57%,
                47% 80%,
                1% 73%,
                0 25%
            );
        }
        75% {
            clip-path: polygon(
                38% 42%,
                42% 19%,
                100% 71%,
                56% 57%,
                48% 82%,
                0 71%,
                0 26%
            );
        }
        100% {
            clip-path: polygon(
                38% 43%,
                44% 19%,
                100% 71%,
                56% 57%,
                47% 80%,
                0 73%,
                0 26%
            );
        }
    }

    @keyframes backgroundWhiteAnimation {
        0% {
            clip-path: polygon(0 0, 90% 0, 100% 87%, 10% 100%);
        }
        25% {
            clip-path: polygon(2% 0, 90% 0, 99% 86%, 10% 100%);
        }
        50% {
            clip-path: polygon(0 0, 90% 2%, 100% 87%, 11% 100%);
        }
        75% {
            clip-path: polygon(0 0, 90% 0, 100% 87%, 10% 99%);
        }
        100% {
            clip-path: polygon(0 0, 90% 0, 100% 87%, 10% 100%);
        }
    }

    @keyframes backgroundBlackAnimation {
        0% {
            clip-path: polygon(0 0, 93% 0, 100% 87%, 8% 100%);
        }
        25% {
            clip-path: polygon(0 0, 92% 0, 100% 87%, 9% 100%);
        }
        50% {
            clip-path: polygon(0 0, 93% 1%, 100% 87%, 8% 99%);
        }
        75% {
            clip-path: polygon(1% 1%, 93% 0, 99% 87%, 8% 100%);
        }
        100% {
            clip-path: polygon(0 0, 93% 0, 100% 87%, 8% 100%);
        }
    }
}
</style>
