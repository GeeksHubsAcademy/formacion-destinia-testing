import { testId } from "../utils";

import { addTask } from "../steps/addTask";

describe('Persistance', () => {

  it('should persist the task', () => {

    const TEXT_TO_ADD = 'comprar-leche' + Math.random();

    cy.visit('/');
    addTask(TEXT_TO_ADD);

    cy.reload();

    cy.get(testId('todos-list'))
      .find(testId(TEXT_TO_ADD))
      .should('have.text', TEXT_TO_ADD)

  })

})
