<template>
    <div class="bg-green-50 w-full mb-5 p-5 border-2 border-green-70 text-right font-bold rounded-md">
        <p class="font-base text-3xl align-baseline pb-2 border-b border-green-200">{{ result }}</p>
        <p class="pt-1"><sub class="font-base text-1xs align-bottom">{{ operation }}</sub></p>
    </div>
</template>

<script>
export default {
    name: "Result",
    props: ['result', 'operation']
}
</script>

<style scoped>

</style>
