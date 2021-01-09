var john_team=[89,120,103];
var mike_team=[114,94,123];
var avgjohn,avgmike;
var sum1=0,sum2=0,i;
		for(i = 0; i <3; i++) { 
   				   sum1 = john_team[i]+sum1;
    	 }
document.write(sum1);
    	avgjohn=sum1/3;
     	for(i = 0; i <3; i++) { 
      			sum2 = mike_team[i]+sum2;
     	}

    	avgmike=sum2/3;

    	document.write("john_average"+ avgjohn + "<br>");
		document.write("mike_average"+ avgmike + "<br>");
	if(avgjohn>avgmike)
	{
			document.write("winner is john team <br>");
	}
	else if(avgjohn < avgmike)
	{
			document.write("winner is mike team <br>");

	}
	else
	{

			document.write("match is draw no one is winner is <br>");

	}


	document.write("new scenario<br><br>");
	for(i=0;i<3;i++)
	{
			john_team[i]=prompt("enter john "+ i + "team score");

	}
	for(i=0;i<3;i++)
	{
			mike_team[i]=prompt("enter mike  "+ i+1 + "team score");

	}

	for(i = 0; i<3; i++) { 
   					   document.write(john_team[i]);

     }
	sum1=0,sum2=0;
	for(i = 0; i<3; i++)
	 { 
   				   sum1 = john_team[i]+sum1;
   	 }

    avgjohn=sum1/3;
     for(i = 0; i <3; i++) 
     { 
  			sum2 = mike_team[i]+sum2;
  	}

    avgmike=sum2/3;

    	
	if(avgjohn>avgmike)
	{
		document.write("winner is john team <br>");
	}
	else if(avgjohn < avgmike)
	{
		document.write("winner is mike team <br>");

	}
	else
	{

		document.write("match is draw no one is winner is <br>");

	}

