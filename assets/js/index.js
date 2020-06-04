
function setCountDown(dueToDate) {
	var x = setInterval(function() {
		var now = new Date().getTime();

		var distance = new Date(dueToDate - now);

		var minutes = distance.getMinutes();

		const oneDay = 1000 * 60 * 60 * 24;
		const oneHour = 1000 * 60 * 60;
		const oneMinute = 1000 * 60;
		const difference = Math.floor(distance);
		const flatDays = (distance - (distance % oneDay)) / 1000 / 60 / 60 / 24;
		const brokeDays = distance % oneDay;
		const flatHours = Math.floor(((brokeDays - (brokeDays % 1000 * 60 * 60)) / 1000 / 60 / 60));
		const brokeHours = Math.floor(distance % oneHour)
		const flatMinutes = Math.floor((brokeHours - (brokeHours % (1000 * 60))) / 1000 / 60);
		const brokeMinutes = Math.floor(distance % oneMinute);
		const seconds = Math.floor(brokeMinutes / 1000); 

		document.getElementById("countDown").innerHTML = "Days: " + flatDays + ", Hours: "+ flatHours + ", Minutes: " + flatMinutes + ", Seconds: " + seconds;

		if(distance < 0) {
			clearInterval(x);
			document.getElementById("countDown").innerHTML = "EXPIRED";
		}
	}, 1000);
}

document.addEventListener("DOMContentLoaded", function(event) {
	var countDownDate = new Date("June 5, 2020 12:00:00").getTime();
	setCountDown(countDownDate);
	events();
});

function events() {
	//document.getElementById("rightBtn");
	var a = document.getElementsByClassName("left")
	
	for( let i = 0; i < a.length; a++) {
		a[i].addEventListener("click", function() {
        	//var s = a[i].innerText;
        	console.log("Clicked");
        	graph();
		});
	}

	var b = document.getElementsByClassName("right")

    for( let i = 0; i < a.length; a++) {
    	b[i].addEventListener("click", function() {
			
            //var s = b[i].innerText;
            console.log("Clicked");
          	graph();
    	});
    }
}

function graph() {
	var ctx = document.getElementById("myChart").getContext("2d");
	var chart = new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["Pepsi", "Cola"],
			datasets: [{
				label: "Result of Vote",
				backgroundColor: "rgb( 171, 171, 171)",
				borderColor: "rgb( 0, 0, 0)",
				data: [ 15, 20]
			}]
		}
	})
}
