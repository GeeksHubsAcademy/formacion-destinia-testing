/// <reference types="cypress" />


describe.only('localstorage', () => {
    before(() => {
        cy.clearLocalStorage();
    })

    it('must persist actions on reloads', () => {

        cy.visit('/');
        cy.get('[data-testid="todo-input"]')
            .type('todo 1{enter}')
            .type('todo 2{enter}');

        cy.get('[data-testid="todo-item"]').should('have.length', 2);
        cy.reload();

        cy.get('[data-testid="todo-item"]', { timeout: 4000 }).should('have.length', 2);

    });



})
