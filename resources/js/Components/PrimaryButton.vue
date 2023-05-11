<template>
    <button
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
<style scoped>
button {
    background:  #e37f81;
    color: white;
}
button:hover{
    color: black;
    background: #e37f81;
}
</style>
