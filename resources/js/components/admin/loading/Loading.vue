<template>
    <div class="w-full h-full fixed inset-0 bg-blur z-[999]">
        <div
            id="animationWindow"
            class="
                w-[90%]
                h-[90%]
                md:w-[60%] md:h-[60%]
                absolute
                top-[50%]
                left-[50%]
                translate-x-[-50%] translate-y-[-50%]
            "
        ></div>
    </div>
</template>
<script>
import lottieWeb from "lottie-web";
export default {
    mounted() {
        var animData = {
            wrapper: document.querySelector("#animationWindow"),
            animType: "svg",
            loop: true,
            prerender: true,
            autoplay: true,
            path: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/LEGO_loader.json",
        };
        var anim = lottieWeb.loadAnimation(animData);
        anim.setSpeed(3.4);
    },
};
</script>
<style>
.bg-blur {
    background: rgba(0, 0, 0, 0.3);
}
</style>
