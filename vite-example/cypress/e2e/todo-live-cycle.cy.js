
import { addTask } from "../steps/addTask";
import { testId } from "../utils";

describe('Test todo live cycle', () => {

  const TEXT_TO_ADD = 'comprar-leche-' + Date.now();

  before(() => {
    localStorage.clear();
  });
  it('adds a task', () => {
    cy.visit('/');

    addTask(TEXT_TO_ADD);
    cy.get(testId('todos-list'))
      .find(testId(TEXT_TO_ADD))
      .should('have.text', TEXT_TO_ADD);

  })
  it('total count should work', () => {
    cy.get(testId('todos-count')).should('have.text', '1');
  });

  it('complete task', () => {
    cy.get(testId('todos-list'))
      .find(testId(TEXT_TO_ADD))
      .parent()
      .find('button')
      .should('have.text', 'Done')
      .click();

    cy.get(testId(TEXT_TO_ADD)).should('not.exist');
  });
  it('total count disappear when 0', () => {
    cy.get(testId('todos-count')).should('not.exist');
  });
  it('total count done should work', () => {
    cy.get(testId('todos-done-count')).should('have.text', '1');
  });
  it('link to done should work', () => {
    cy.get(testId('link-done')).click();
    cy.get(testId(TEXT_TO_ADD))
      .should('have.text', TEXT_TO_ADD);
  })
  it('remove task', () => {
    cy.get(testId(TEXT_TO_ADD))
      .parent()
      .find('button')
      .should('have.text', 'Delete')
      .click()

    cy.get(testId(TEXT_TO_ADD)).should('not.exist');

  });

  it('total count done disappear when 0', () => {
    cy.get(testId('todos-done-count')).should('not.exist');
  });

})