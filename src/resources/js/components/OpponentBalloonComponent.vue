<template>
    <div class="opponent-ballon-wrapper">
        <div class="opponent-message-window">
            <div class="opponent-message-area">
                <div class="opponent-content">
                    <div class="opponent-arrow-white"></div>
                    <div class="opponent-arrow-black"></div>
                    <div class="opponent-background-white"></div>
                    <div class="opponent-background-black"></div>
                    <div class="opponent-text-area prewrap reak-word">{{chat.message}}</div>
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

.prewrap {
    white-space: pre-wrap;
}

.break-word {
    word-wrap: break-word;
}

.opponent-ballon-wrapper {
    @media screen and (max-width: 480px) {
        max-width: 65%;
    }
    @media screen and (min-width: 480px) and (max-width: 1024px) {
        max-width: 70%;
    }
    @media screen and (min-width: 1024px) {
        max-width: 75%;
    }
}
.opponent-message-window {
    .opponent-message-area {
        > .opponent-content {
            position: relative;

            .opponent-arrow-white {
                background-color: #fff;
                position: absolute;
                width: 33px;
                height: 20px;
                bottom: 22px;
                left: -18px;
                // z-index: -20;
                z-index: 30;

                clip-path: polygon(
                    62% 43%,
                    100% 17%,
                    100% 73%,
                    50% 100%,
                    44% 56%,
                    0 71%,
                    55% 8%
                );
                animation-name: opponentArrowWhiteAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .opponent-arrow-black {
                background-color: #000;
                position: absolute;
                width: 37px;
                height: 20px;
                bottom: 22px;
                left: -18px;

                // z-index: 10;
                z-index: 40;

                clip-path: polygon(
                    62% 43%,
                    100% 26%,
                    100% 73%,
                    53% 80%,
                    44% 56%,
                    0 71%,
                    56% 19%
                );

                animation-name: opponentArrowBlackAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .opponent-background-white {
                background-color: #fff;
                position: absolute;
                width: 110%;
                height: 100%;
                // z-index: 40;
                z-index: 10;

                clip-path: polygon(6% 0, 100% 0, 90% 100%, 0 87%);

                animation-name: opponentBackgroundWhiteAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }

            .opponent-background-black {
                background-color: #000;
                position: absolute;

                width: 102%;
                height: calc(100% - 12px);
                margin-left: 5px;
                margin-right: 20px;
                margin-top: 5px;
                margin-bottom: 7px;

                // z-index: 30;
                z-index: 50;

                clip-path: polygon(6% 0, 100% 0, 95% 100%, 0 87%);

                animation-name: opponentBackgroundBlackAnimation;
                animation-duration: 1s;
                animation-iteration-count: infinite;
            }
            .opponent-text-area {
                max-width: 102%;
                width: max-content;
                color: #fff;
                @media screen and (max-width: 480px) {
                    font-size: 14px;
                }
                @media screen and (min-width: 480px) {
                    font-size: 20px;
                }
                margin-left: 5px;
                margin-right: 50px;
                margin-top: 5px;
                margin-bottom: 7px;

                // padding-left: 30px;
                // padding-right: 30px;
                padding-left: 10%;
                padding-right: 5%;

                padding-top: 15px;
                padding-bottom: 20px;

                line-height: 1.2em;
                position: inherit;
                z-index: 60;
            }
        }
    }
    @keyframes opponentArrowWhiteAnimation {
        0% {
            clip-path: polygon(
                62% 43%,
                100% 17%,
                100% 73%,
                50% 100%,
                44% 56%,
                0 71%,
                55% 8%
            );
        }
        25% {
            clip-path: polygon(
                62% 43%,
                100% 18%,
                99% 73%,
                50% 99%,
                44% 56%,
                0 72%,
                55% 8%
            );
        }
        50% {
            clip-path: polygon(
                61% 43%,
                98% 17%,
                100% 73%,
                48% 100%,
                43% 56%,
                1% 71%,
                56% 8%
            );
        }
        75% {
            clip-path: polygon(
                62% 44%,
                100% 17%,
                100% 72%,
                50% 100%,
                44% 58%,
                0 71%,
                55% 9%
            );
        }
        100% {
            clip-path: polygon(
                62% 43%,
                100% 17%,
                100% 73%,
                50% 100%,
                44% 56%,
                0 71%,
                55% 8%
            );
        }
    }
    @keyframes opponentArrowBlackAnimation {
        0% {
            clip-path: polygon(
                62% 43%,
                100% 26%,
                100% 73%,
                53% 80%,
                44% 56%,
                0 71%,
                56% 19%
            );
        }
        25% {
            clip-path: polygon(
                63% 43%,
                100% 26%,
                98% 73%,
                53% 80%,
                42% 56%,
                1% 71%,
                56% 19%
            );
        }
        50% {
            clip-path: polygon(
                62% 44%,
                100% 27%,
                100% 72%,
                53% 81%,
                44% 57%,
                0 74%,
                56% 18%
            );
        }
        75% {
            clip-path: polygon(
                62% 43%,
                99% 26%,
                100% 73%,
                54% 80%,
                44% 56%,
                0 71%,
                57% 19%
            );
        }
        100% {
            clip-path: polygon(
                62% 43%,
                100% 26%,
                100% 73%,
                53% 80%,
                44% 56%,
                0 71%,
                56% 19%
            );
        }
    }

    @keyframes opponentBackgroundWhiteAnimation {
        0% {
            clip-path: polygon(6% 0, 100% 0, 90% 100%, 0 87%);
        }
        25% {
            clip-path: polygon(6% 0, 98% 1%, 90% 100%, 1% 88%);
        }
        50% {
            clip-path: polygon(6% 2%, 100% 0, 89% 100%, 0 87%);
        }
        75% {
            clip-path: polygon(6% 0, 100% 0, 90% 99%, 0 87%);
        }
        100% {
            clip-path: polygon(6% 0, 100% 0, 90% 100%, 0 87%);
        }
    }

    @keyframes opponentBackgroundBlackAnimation {
        0% {
            clip-path: polygon(6% 0, 100% 0, 95% 100%, 0 87%);
        }
        25% {
            clip-path: polygon(7% 0, 100% 0, 94% 100%, 0 88%);
        }
        50% {
            clip-path: polygon(6% 1%, 100% 0, 95% 99%, 0 87%);
        }
        75% {
            clip-path: polygon(6% 0, 99% 1%, 95% 100%, 1% 87%);
        }
        100% {
            clip-path: polygon(6% 0, 100% 0, 95% 100%, 0 87%);
        }
    }
}
</style>
