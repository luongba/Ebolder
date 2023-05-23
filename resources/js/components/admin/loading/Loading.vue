<template>
  <div class="w-full h-full fixed inset-0 bg-blur z-[999]">
    <div
      id="animationWindow"
      class="w-[90%] h-[90%] md:w-[60%] md:h-[60%] absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"
      style="display: flex;align-items: center;justify-content: center;"
    >
      <span class="ant-spin-dot ant-spin-dot-spin">
        <i></i><i></i><i></i><i></i>
      </span>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    // var animData = {
    //     wrapper: document.querySelector("#animationWindow"),
    //     animType: "svg",
    //     loop: true,
    //     prerender: true,
    //     autoplay: true,
    //     path: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/LEGO_loader.json",
    // };
    // var anim = lottieWeb.loadAnimation(animData);
    // anim.setSpeed(3.4);
  },
};
</script>
<style>
.bg-blur {
  background: rgba(0, 0, 0, 0.04);
}
.ant-spin-dot {
  position: relative;
  display: inline-block;
  font-size: 20px;
  width: 20px;
  height: 20px;
}
.ant-spin-dot-spin {
  transform: rotate(45deg);
  animation: antRotate 1.2s infinite linear;
}

.ant-spin-dot i {
  width: 9px;
  height: 9px;
  border-radius: 100%;
  background-color: rgb(0, 26, 255);
  transform: scale(0.75);
  display: block;
  position: absolute;
  opacity: 0.3;
  animation: antSpinMove 1s infinite linear alternate;
  transform-origin: 50% 50%;
  &:nth-child(1) {
    left: 0;
    top: 0;
  }
  &:nth-child(2) {
    right: 0;
    top: 0;
    animation-delay: 0.4s;
  }
  &:nth-child(3) {
    right: 0;
    bottom: 0;
    animation-delay: 0.8s;
  }
  &:nth-child(4) {
    left: 0;
    bottom: 0;
    animation-delay: 1.2s;
  }
}
@keyframes antSpinMove {
  to {
    opacity: 1;
  }
}
@keyframes antRotate {
  to {
    transform: rotate(405deg);
  }
}
</style>
