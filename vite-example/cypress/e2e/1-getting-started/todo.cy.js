/// <reference types="cypress" />









describe('mocking', () => {

  class Car {
    intervalId = null;
    constructor() {
      this.speed = 0
    }

    accelerate() {
      this.speed += 1
    }

    brake() {
      this.speed -= 1
    }

    getSpeed() {
      console.log('getSpeed');
      cy.log('getSpeed');
      return this.speed
    }
    play(fn) {
      console.log('playing...');
      fn();
    }

    startRadio() {
      console.log('startRadio');
      const self = this;
      this.intervalId = setInterval(() => {
        self.play(() => console.log('anda ya!'));
      }, 1_000);

    }
    stopRadio() {
      console.log('stopRadio');
      clearInterval(this.intervalId);
    }

  }
  it('mock and existent method', () => {
    const car = new Car();
    cy.stub(car, 'getSpeed').returns(2);
    car.accelerate();
    // car.getSpeed = function() { return 2};

    expect(car.getSpeed()).to.equal(2);



  });
  it('mock and existent method', () => {
      const car = new Car();

      const stub = cy.stub();

      car.play(stub);
      expect(stub).to.calledOnce;
  });

  it.skip('radio should work', () => {

    const car = new Car();
    cy.spy(car, 'play');
    car.startRadio();
    cy.clock();
    cy.tick(30_000);
    cy.clock().then((clock) => {
      car.stopRadio();
      clock.restore();
      expect(car.play).to.be.calledThrice;
    });
  });

});