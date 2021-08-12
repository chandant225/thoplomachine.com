<template>
    <div class="loading">
        <div class="loading-body">
            <div class="image">
                <img :src="image" alt="" />
            </div>
            <div class="component"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Loading",
    data() {
        return {
            image: "/assets/images/mb-logo.png"
        };
    }
};
</script>

<style>
.loading {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0px;
    left: 0px;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 999999;
}
.loading .loading-body {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.loading .loading-body .image img {
    width: 100px;
    height: auto;
    border: 3px solid black;
    padding: 5px;
    border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3Cstyle%3Epath%7Banimation:stroke 3s infinite linear%3B%7D%40keyframes stroke%7Bto%7Bstroke-dashoffset:776%3B%7D%7D%3C/style%3E%3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%232d3561' /%3E%3Cstop offset='25%25' stop-color='%23c05c7e' /%3E%3Cstop offset='50%25' stop-color='%23f3826f' /%3E%3Cstop offset='100%25' stop-color='%23ffb961' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3' stroke-dasharray='388'/%3E %3C/svg%3E")
        1;
}
</style>
