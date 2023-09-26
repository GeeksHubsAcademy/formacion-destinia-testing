import TodoItem from './TodoItem.vue'

describe('<TodoItem />', () => {
  it('renders', () => {
    // see: https://on.cypress.io/mounting-vue
    cy.mount(TodoItem)
  })
})