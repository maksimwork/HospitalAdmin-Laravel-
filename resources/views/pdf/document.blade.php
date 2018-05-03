<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
		<style>
		 	@page{
                   /* background-image: url("/plugins/images/adam.png"); */
                   
               }
		</style>
	</head>
	<body>
		<htmlpageheader name="page-header">
			Your Header Content
		</htmlpageheader>

		<!-- <div>
			<p>PDF Print for Page</p>
			@foreach($data as $dataitem)
				{{$dataitem->title}}
			@endforeach
		</div> -->

		<div id="wrapper">
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row bg-title">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="text-align: center">
							<!-- <h4 >Adam Vital</h4>  -->
							<img src="http://18.218.188.239/adam.jpg" alt="" class="logo" />
						</div>
					</div>
				
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="white-box">
							@foreach($data as $dataitem)
								<div style = "margin-top:100px;">
								</div>
								<div class = "row">
									<div class="col-md-8"> {{$dataitem->title}}</p>
									</div>
									<hr>
									<div class="col-md-8"> {{$dataitem->description}}</p>
									</div>
									<div style="text-align: center">
										<p>{{"Repeat :  " . $dataitem->repeat}}</p>
									</div>
							@endforeach
								<div style = "margin-top:50px;">
								</div>
								<hr>
								<div class="col-xs-12">
									<!-- <p><strong>Support Team</strong></p> -->
									<p>Adam Vital Physiotherapy & rehabilitation center</p>
									<p>T: +971 4 2515000 | F: +971 4 2515522</p>
									<p>Address: Index Holding Building, Nad Al Hamar Road, Dubai, UAE</p>
									<p>P.O. Box 76800</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<htmlpagefooter name="page-footer">
			Your Footer Content
			
		</htmlpagefooter>
	</body>
</html>