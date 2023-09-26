/// <reference types="cypress" />



const obj = {
  name: 'Edgar',
  surName: 'Poe',
  getName() {
    return this.name;
  },
  getFirstLetter() {
    return this.name[0];
  },
  getFullName() {
    return this.getName() + ' ' + this.surName;
  },
  do(fn) {
    return this.getFullName() + ' does: ' + fn();
    // return this.getFullName() + ' does: ' +  'i am running';
  }
}


it('let test a object mock', () => {

  cy.stub(obj, 'getName').returns('Jane');

  expect(obj.getName()).to.equal('Jane');
  expect(obj.getFirstLetter()).to.equal('E');
  expect(obj.getFullName()).to.equal('Jane Poe');
})


it('let test a object mock', () => {

  const fn = () => 'i am running';

  expect(obj.do(fn)).to.equal('Edgar Poe does: i am running');

  const stub = cy.stub().returns('123');

  expect(obj.do(stub)).to.equal('Edgar Poe does: 123');
  expect(stub).to.have.been.calledOnce;
  expect(stub).to.have.been.calledWith();

})