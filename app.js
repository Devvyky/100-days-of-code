//  Day 005
// This Keyword In Javascript

console.log(this);

var dev = {
  name: "Dev Vyky",
  age: 20,
  yearOfBirth: 1999,
  calculateAge: function() {
    console.log(this);
    console.log(2020 - this.yearOfBirth);
    /*
    function innerFuntion() {
      console.log(this);
    }
    innerFuntion();
    */
  }
};

dev.calculateAge();

var mike = {
  name: "mike",
  yearOfBirth: 1984
};

mike.calculateAge = dev.calculateAge;
mike.calculateAge();
