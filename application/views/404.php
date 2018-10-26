
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Raleway:700);

*, *:before, *:after {
	box-sizing: border-box;
}
html {
	height: 100%;
}
body {
	background-size: cover;
	font-family: 'Raleway', sans-serif;
	background-color: #342643; 
	height: 100%;
}

.text-wrapper {
	height: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}

.title {
	font-size: 6em;
	font-weight: 700;
	color: #EE4B5E;
}

.subtitle {
	font-size: 40px;
	font-weight: 700;
	color: #1FA9D6;
}

.buttons {
	margin: 30px;

	a.button {
		font-weight: 700;
		border: 2px solid #EE4B5E;
		text-decoration: none;
		padding: 15px;
		text-transform: uppercase;
		color: #EE4B5E;
		border-radius: 26px;
		transition: all 0.2s ease-in-out;

		&:hover {
			background-color: #EE4B5E;
			color: white;
			transition: all 0.2s ease-in-out;
		}
	}


}


</style>
<div class="text-wrapper">
	<div class="title" data-content="404">
		404
	</div>

	<div class="subtitle">
		Oops, the page you're looking for doesn't exist.
	</div>

	<div class="buttons">
		<a class="button" href="<?php echo base_url()?>" style="color:white">Go to homepage</a>
	</div>
</div>