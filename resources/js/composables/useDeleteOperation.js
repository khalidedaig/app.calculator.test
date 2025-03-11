import {ref, watch} from 'vue'

export default function useDeleteOperation(getMostRecentOperations) {
    const operationDeleted = ref(false)

    const deleteOperation = async(id) => {
        operationDeleted.value = false

        const response = await axios.delete(`./api/operations/${id}`)

        if (response.status === 200) {
            operationDeleted.value = true
        }
    }

    const deleteOperations = async() => {
        operationDeleted.value = false

        const response = await axios.delete(`./api/operations`)

        if (response.status === 200) {
            operationDeleted.value = true
        }
    }

    watch(operationDeleted, (newValue, oldValue) => {
        if (newValue) {
            getMostRecentOperations()
        }
    })

    return {
        operationDeleted,
        deleteOperation,
        deleteOperations,
    }
}
