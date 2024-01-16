
import { addTask } from "../steps/addTask";
import { testId } from "../utils";

describe('Test add todo feature', () => {

  it('adds a task', () => {
    const TEXT_TO_ADD = 'comprar-leche';
    cy.visit('/');

    addTask(TEXT_TO_ADD);
    cy.get(testId('todos-list'))
      .find(testId(TEXT_TO_ADD))
      .should('have.text', TEXT_TO_ADD)
  })
})