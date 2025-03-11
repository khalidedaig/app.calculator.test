import { ref, onMounted } from 'vue'

export default function useRecentOperations() {
    const operations = ref([])
    const getMostRecentOperations = async() => {
        const response = await axios.get('./api/operations')

        if (response.status === 200) {
            operations.value = response.data
        }
    }

    onMounted(getMostRecentOperations)

    return {
        operations,
        getMostRecentOperations,
    }
}
