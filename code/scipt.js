var markHeight=prompt('enter mark Heightin kg');
var markMass=prompt('enter mark mass in meter');
var markBMI = markMass / (markHeight * markHeight);
console.log("markBMI" + markBMI);

var johnHeight=prompt('enter john Heightin kg');
var johnMass=prompt('enter  john mass in meter');
var johnBMI = johnMass / (johnHeight * johnHeight);
console.log("johnBMI" + johnBMI);



var compare;
compare =markBMI > johnBMI;

console.log("Is mark's BMI Higher than John's?"+compare);




