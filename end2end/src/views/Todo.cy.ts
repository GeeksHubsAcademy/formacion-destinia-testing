import Todo from './Todo.vue'

describe('<Todo />', () => {
  it('renders', () => {
    // see: https://on.cypress.io/mounting-vue
    cy.mount(Todo)
  })
})