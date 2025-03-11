<template>
    <div class="mt-12 mb-5">
        <Result :result="result" :operation="operation" />

        <form method="POST" class="grid grid-cols-4 gap-1 grid-cols">
            <Number v-for="(value, name, index) in [7, 8, 9]"
                    :key="index"
                    @click="createOperation(`${value}`)">
                <template v-slot:default>{{ value }}</template>
            </Number>
            <Operator @click="createOperation('/')">
                <template v-slot:default>÷</template>
            </Operator>
            <Number v-for="(value, name, index) in [4, 5, 6]"
                    :key="index"
                    @click="createOperation(`${value}`)">
                <template v-slot:default>{{ value }}</template>
            </Number>
            <Operator @click="createOperation(`*`)">
                <template v-slot:default>×</template>
            </Operator>
            <Number v-for="(value, name, index) in [1, 2, 3]"
                    :key="index"
                    @click="createOperation(`${value}`)">
                <template v-slot:default>{{ value }}</template>
            </Number>
            <Operator @click="createOperation('-')">
                <template v-slot:default>−</template>
            </Operator>
            <Number @click="createOperation('0')">
                <template v-slot:default>0</template>
            </Number>
            <Operator @click="createOperation('.')">
                <template v-slot:default>.</template>
            </Operator>
            <Submit @click="addNewOperation(getMostRecentOperations, $event)">
                <template v-slot:default>=</template>
            </Submit>
            <Operator @click="createOperation('+')">
                <template v-slot:default>+</template>
            </Operator>
            <Clear @click="deleteOperations"
                   v-if="operations.length">
                <template v-slot:default>Clear</template>
            </Clear>
        </form>
    </div>
</template>

<script>
import Result from "@/components/calculator/Result.vue"
import Number from "@/components/calculator/buttons/Number.vue";
import Operator from "@/components/calculator/buttons/Operator.vue";
import Submit from "@/components/calculator/buttons/Submit.vue";
import Clear from "@/components/calculator/buttons/Clear.vue";
import {toRefs} from "vue";

export default {
    name: "Calculator",
    components: {
        Clear,
        Number,
        Operator,
        Result,
        Submit,
    },
    props: ['result', 'getResult', 'operation', 'createOperation', 'operations', 'getMostRecentOperations', 'addNewOperation', 'deleteOperations'],
    setup(props) {
        const { result, getResults, operation, operations, getMostRecentOperations, addNewOperation, deleteOperations } = toRefs(props)

        return {
            result,
            getResults,
            operation,
            operations,
            getMostRecentOperations,
            addNewOperation,
            deleteOperations,
        }
    }
}
</script>

<style scoped>

</style>
