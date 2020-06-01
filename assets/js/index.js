window.onload = function() {

	var countDownDate = new Date("June 5, 2020 12:00:00").getTime();
	setCountDown(countDownDate);
	this.events();
	this.console.log("Halloooo!");
}

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

events();

function events() {
	//document.getElementById("rightBtn");
	document.getElementById("clickedText").innerHTML = "Hallo";
	document.getElementById("leftBtn").addEventListener("click", function() {
		var s = document.getElementById("leftBtn").firstChild.textContent;
		console.log(s);
		clickedText.innerHTML = s;
		graph();
	});
	document.getElementById("rightBtn").addEventListener("click", function() {
		var s = document.getElementById("rightBtn").firstChild.textContent;
		console.log(s);
		clickedText.innerHTML = s;
		graph();
	});
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
