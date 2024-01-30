import { testId } from "../utils";

export function addTask(text, secondsToExpire = 0) {
    cy.get(testId('todo-text-to-add'))
        .type(text);
    if (secondsToExpire) {
        cy.get(testId('todo-expire-at'))
            .type(secondsToExpire);
    }
    cy.get(testId('todo-add')).click();
}