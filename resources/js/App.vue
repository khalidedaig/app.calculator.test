<template>
    <div class="relative max-w-2xl mx-auto">
        <TitleSection>
            <template v-slot:title>Calculator</template>
            <template v-slot:default>Do something 🤖</template>
        </TitleSection>

        <Calculator :result="result"
                    :operation="operation"
                    :operations="operations"
                    :getResult="getResult"
                    :deleteOperations="deleteOperations"
                    :addNewOperation="addNewOperation"
                    :getMostRecentOperations="getMostRecentOperations"
                    :createOperation="createOperation"
        />

        <TickerTape result="result"
                    :operations="operations"
                    :deleteOperation="deleteOperation"
                    :getMostRecentOperations="getMostRecentOperations"
                    v-if="operations.length"
        />
    </div>
</template>

<script>
import Calculator from "@/components/Calculator.vue"
import TitleSection from "@/components/calculator/TitleSection.vue"
import TickerTape from "@/components/calculator/TickerTape.vue"
import useGetResult from "@/composables/useGetResult"
import useRecentOperations from "@/composables/useRecentOperations"
import useDeleteOperation from "@/composables/useDeleteOperation"

export default {
    name: "App",
    components: {
        Calculator,
        TickerTape,
        TitleSection,
    },
    setup() {
        const { result, getResult, operation, createOperation, addNewOperation } = useGetResult()
        const { operations, getMostRecentOperations } = useRecentOperations()
        const { operationDeleted, deleteOperation, deleteOperations } = useDeleteOperation(getMostRecentOperations)

        return {
            result,
            getResult,
            operation,
            createOperation,
            addNewOperation,
            operations,
            getMostRecentOperations,
            operationDeleted,
            deleteOperation,
            deleteOperations,
        }
    },
}
</script>

<style scoped>

</style>
