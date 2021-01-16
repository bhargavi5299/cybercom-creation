var john ={
	 fullname : 'john',
	 mass :72,
	 height :1.77,
	 johnBMI:function()
	 {
	 	this.bmi= this.mass / (this.height * this.height);
	 	return this.bmi;

	 }
}

var mass ={
	 fullname : 'mass',
	 mass :68,
	 height :1.75,
	 massBMI:function()
	 {
	 	this.bmi= this.mass / (this.height * this.height);
	 	return this.bmi;

	 }
}
john.johnBMI();
mass.massBMI();
console.log(john,mass);
if (johnBMI>massBMI)
 {
 	console.log(john.fullname + ' is higher bmi ' +johnBMI);
 }
