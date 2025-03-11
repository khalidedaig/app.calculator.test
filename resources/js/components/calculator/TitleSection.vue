<template>
    <div class="text-center">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">
            <slot name="title"></slot>
        </h2>
        <p class="mt-4 text-lg leading-6 text-gray-500 dark:text-gray-200">
            <slot></slot>
        </p>
    </div>

</template>

<script>
export default {
    name: "TitleSection"
}
</script>

<style scoped>

</style>
