<template>
    <div class="bg-yellow-200 text-right font-base font-light w-full h-auto overflow-hidden p-5 relative bottom-0 max-h-96 mb-5">
        <ul class="m-0 p-0 w-full relative h-auto bottom-0 flex flex-col-reverse">
            <TickerRow v-for="operation in operations"
                       :key="operation.id"
                       :row="operation"
                       @click="deleteOperation(operation.id)"
            />
        </ul>
    </div>
</template>

<script>
import { toRefs } from 'vue'
import TickerRow from "./TickerRow.vue";

export default {
    name: 'TickerTape',
    components: {TickerRow},
    props: ['result', 'operations', 'deleteOperation', 'getMostRecentOperations'],
    setup(props) {
        const { result, operations, deleteOperation, getMostRecentOperations } = toRefs(props)

        return {
            result,
            operations,
            deleteOperation,
            getMostRecentOperations
        }
    }
}
</script>

<style scoped>

</style>
