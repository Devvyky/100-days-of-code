// Funtion Constructors and Inheritance
var john = {
  name: "John",
  yearOfBirth: 1999,
  job: "Developer"
};

var Person = function(name, yearOfBirth, job) {
  this.name = name;
  this.yearOfBirth = yearOfBirth;
  this.job = job;
};

Person.prototype.calculateAge = function() {
  console.log(2020 - this.yearOfBirth);
};

Person.prototype.lastName = "Smith";

var john = new Person("John", 1990, "teacher");

john.calculateAge();

console.log(john.lastName);

var jane = new Person("Jane", 1994, "designer");

jane.calculateAge();
console.log(jane.lastName);

var doe = new Person("Doe", 1974, "plumber");

doe.calculateAge();
console.log(doe.lastName);
