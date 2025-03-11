<template>

        <button type="button"
                class="cursor-pointer w-full items-center px-6 py-3 border border-transparent text-base text-center font-medium font-bold rounded-md text-gray-700 bg-gray-200 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            <slot></slot>
        </button>

</template>

<script>
export default {
    name: "Number"
}
</script>

<style scoped>

</style>
