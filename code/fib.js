var fi = prompt("Enter the value to get fibonacci series");
console.log(fibbo(fi));
document.write("The fibonacci series is :- " + fibbo(fi));

function fibbo(n){
    const fibarray = [0,1];

    for (var i=2;i<=n;i++)
    {
        fibarray.push(fibarray[i-2] + fibarray[i-1]);
    }
    return fibarray;
}