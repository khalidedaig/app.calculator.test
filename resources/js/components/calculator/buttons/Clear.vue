<template>
    <div class="col-span-4 mt-2">
        <button type="reset"
                class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white font-bold bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <slot></slot>
        </button>
    </div>
</template>

<script>
export default {
    name: "Clear"
}
</script>

<style scoped>

</style>
