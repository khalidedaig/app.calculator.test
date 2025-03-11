import { ref } from 'vue'
import { isEmpty } from 'lodash'
import { addition, subtraction, division, multiplication } from './operations'

export default function useGetResult() {
    const result = ref('0')
    const operation = ref('0')
    const getResult = () => {
        const operationToAnalyse = operation.value.split('')

        if (isEmpty(operationToAnalyse)) {
            result.value = 0

            return
        }

        if ((operationToAnalyse.find((char) => char === '+'))){
            result.value = addition(operation)

            return
        }

        if (operationToAnalyse.find((char) => char === '-')){
            result.value = subtraction(operation)

            return
        }

        if (operationToAnalyse.find((char) => char === '*')){
            result.value = multiplication(operation)

            return
        }

        if (operationToAnalyse.find((char) => char === '/')){
            result.value =division(operation)

            return
        }

        result.value = 0
    }
    const createOperation = async(char) => {
        if (result.value !== 0) {
            result.value = 0

            operation.value = ''
        }

        operation.value += char
    }
    const addNewOperation = async(getMostRecentOperations, event) => {
        if (event) {
            event.preventDefault()
        }

        getResult()

        if (operation.value.length <= 0 || result === '0') {
            return false
        }

        const response = await axios.post('./api/operations', {
            operation: operation.value,
        })

        if (response.status === 201) {
            getMostRecentOperations()
        }
    }

    return {
        operation,
        createOperation,
        addNewOperation,
        result,
        getResult,
    }
}
