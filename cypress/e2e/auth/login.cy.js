// describe('template spec', () => {
//   it('passes', () => {
//     cy.visit('https://example.cypress.io')
//   })
// })

beforeEach(() => {
  cy.resetDatabase();
});

context("POST /api/auth/login", () => {
  it("Testing api login", () => {
    cy.request({
      method: "POST",
      url: "/api/auth/login", 
      body: {
        "email" : "es_tests_admin@yopmail.com",
        "password" : "@pA55w0Rd_T3sT",
        "remember_me" : 1
      },
      headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
      }
    }).then((response) => {
      expect(response.status).to.eq(200)
      expect(response.body.code).eq('200');
      expect(response.body.message).eq('Inicio de sesión exitoso');
    })
  })
})