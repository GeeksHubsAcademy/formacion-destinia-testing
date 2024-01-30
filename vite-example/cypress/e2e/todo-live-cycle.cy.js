
import { addTask } from "../steps/addTask";
import { testId } from "../utils";

describe('Test todo live cycle', () => {

  const TEXT_TO_ADD = 'comprar-leche-' + Date.now();

  before(() => {
    localStorage.clear();
  });
  describe('add todo', () => {
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
  });
  describe('mark as done', () => {

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
    });
  });

  describe('remove todo', () => {
    function removeTodo() {
      return cy.get(testId(TEXT_TO_ADD))
        .parent()
        .find('button')
        .should('have.text', 'Delete')
        .click();
    }

    context('when canceled', () => {
      it('should not remove the task', () => {
        let confirmStub;
        cy.window().then((_window) => {
          confirmStub = cy.stub(_window, 'confirm').as('confirm').returns(false)
        });

        removeTodo()
          .then(() => {
            expect(confirmStub).to.be.calledWith('Are you sure?');
          });

        // confirm cancel
        cy.get(testId(TEXT_TO_ADD)).should('exist');
      });

      it('total count still will be 1', () => {
        cy.get(testId('todos-done-count')).should('have.text', '1');
      });


    });
    context('when confirmed', () => {
      it('should remove the task', () => {
        let confirmStub;
        cy.window().then((_window) => {
          confirmStub = cy.stub(_window, 'confirm').as('confirm').returns(true)
        });

        removeTodo()
          .then(() => {
            expect(confirmStub).to.be.calledWith('Are you sure?');
          });

        cy.get(testId(TEXT_TO_ADD)).should('not.exist');

      });

      it('total count done disappear when 0', () => {
        cy.get(testId('todos-done-count')).should('not.exist');
      });
    });
  });

  describe('add todo with expired date', () => {
    const text = TEXT_TO_ADD + '-expired';
    beforeEach(() => {
      cy.clock();
      cy.visit('/');
    });
    afterEach(() => {
      cy.clock().invoke('restore');
    });
    it('adds a task', () => {
      addTask(text, 1);
      cy.tick(1001);
      cy.get(testId(text)).should('not.exist');

    });
    it('add a task with expired date but reload before expiration', () => {
      addTask(text, 1);
      cy.reload();
      cy.tick(1001);
      cy.get(testId(text)).should('not.exist');

    });
  });

})