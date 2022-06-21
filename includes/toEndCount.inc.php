<?php
const days = document.getElementById('days');
													 	 	const hours = document.getElementById('hours');
													 	 	const minutes = document.getElementById('minutes');
													 	 	const seconds = document.getElementById('seconds');
													 	 	const endYear = new Date().getFullYear();
													 	 	const endTime = new Date(`<?php echo $endDate; ?>`);

													 	 	function updateCountdown() {
													 	 		const currentTime = new Date();
													 	 		const diff = endTime - currentTime;
													 	 		if (diff > 0){
													 	 		const d = Math.floor(diff / 1000 / 60 / 60 / 24);
													 	 		const h = Math.floor(diff / 1000 / 60 / 60) % 24;
													 	 		const m = Math.floor(diff / 1000 / 60 ) % 60;
													 	 		const s = Math.floor(diff / 1000 ) % 60;
													 	 		days.innerHTML = d;
													 	 		hours.innerHTML = h < 10 ? '0' + h : h;
													 	 		minutes.innerHTML = m < 10 ? '0' + m : m;
													 	 		seconds.innerHTML = s < 10 ? '0' + s : s;
													 	 	} else { days.innerHTML = 0;
													 	 		hours.innerHTML = 0;
													 	 		minutes.innerHTML = 0;
													 	 		seconds.innerHTML = 0;}
													 	 	}
													 	 	
													 	 	setInterval(updateCountdown, 1000);