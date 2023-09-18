describe('Example Test Suite', () => {
  beforeEach(() => {
    cy.visit('https://www.example.com')
  })

  it('should have a title', () => {
    cy.title().should('include', 'Example')
  })

  it('should have a visible header', () => {
    cy.get('h1').should('be.visible')
  })

  it('should have a working link', () => {
    cy.get('a').contains('Learn More').click()
    cy.url().should('include', '/learn-more')
  })
})