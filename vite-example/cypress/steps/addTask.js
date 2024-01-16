import { testId } from "../utils";

export function addTask(text) {
    cy.get(testId('todo-text-to-add'))
        .type(text);
    cy.get(testId('todo-add')).click();
}