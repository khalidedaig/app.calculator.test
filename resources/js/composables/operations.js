import { isNull, isNumber, isEmpty } from 'lodash'

function validateOperatings([ operationOne, operationgTwo ]) {
    if (isNull(operationOne) || isNull(operationOne)) {
        throw new Error('One of the operands is not present.')
    }

    if (isNumber(operationOne) || isNumber(operationgTwo)) {
        throw new Error('One of the operands is not a valid number.')
    }

    const firstOperating = parseFloat(operationOne) ?? 0.0
    const secondOperating = parseFloat(operationgTwo) ?? 0.0

    if (isNaN(firstOperating) || isNaN(secondOperating)) {
        throw new Error('The operation is not valid.')
    }

    return [
        firstOperating,
        secondOperating,
    ];
}

function addition(operation) {
    const operatings = operation.value.split(/[+]+/)
    if (
        operatings.length > 1 &&
        (!isEmpty(operatings[0]) && !isEmpty(operatings[1]))
    ) {
        const [firstOperating, secondOperating] = validateOperatings(operatings)

        return (parseFloat(firstOperating + secondOperating))
    }
}

function subtraction(operation) {
    const operatings = operation.value.split(/[\-]+/)
    if (
        operatings.length > 1 &&
        (!isEmpty(operatings[0]) && !isEmpty(operatings[1]))
    ) {
        const [firstOperating, secondOperating] = validateOperatings(operatings)

        return (parseFloat(firstOperating - secondOperating))
    }
}

function division(operation) {
    const operatings = operation.value.split(/[\/]+/)
    if (
        operatings.length > 1 &&
        (!isEmpty(operatings[0]) && !isEmpty(operatings[1]))
    ) {
        const [firstOperating, secondOperating] = validateOperatings(operatings)

        return (parseFloat(firstOperating / secondOperating))
    }
}

function multiplication(operation) {
    const operatings = operation.value.split(/[\*]+/)
    if (
        operatings.length > 1 &&
        (!isEmpty(operatings[0]) && !isEmpty(operatings[1]))
    ) {
        const [firstOperating, secondOperating] = validateOperatings(operatings)

        return (parseFloat(firstOperating * secondOperating))
    }
}

export {
    addition,
    subtraction,
    multiplication,
    division
}
