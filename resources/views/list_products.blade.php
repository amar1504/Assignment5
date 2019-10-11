<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie" lang="en" dir="ltr"><![endif]-->
<!--[if gt IE 8]> <html class="no-js gt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="http://wireframes.php-dev.in/training/v1.2/php/assignment/favicon.ico">
<title>Vital Partners Leading Dating and Introduction Agency in Sydney &amp; Canberra</title>
<link href="{{ asset('css/default.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('css/stylesheet.css')}}" rel="stylesheet" type="text/css" media="all">
<!--<link href="css/small-resolution.css" rel="stylesheet" type="text/css" media="all">
<link href="css/medium-resolution.css" rel="stylesheet" type="text/css" media="all">
<link href="css/high-resolution.css" rel="stylesheet" type="text/css" media="all">-->

<!-- jQuery library (served from Google) -->
<script src="{{ asset('js/jquery.js')}}"></script>
<!-- bxSlider Javascript file -->
<script src="{{ asset('js/jquery_003.js') }}"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

<!-- bxSlider CSS file -->
<link href="{{ asset('css/jquery.css') }}" rel="stylesheet">
<!-- Responsive -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">


</head>

<body>
<!--wrapper-starts-->
<div id="wrapper"> 
  
 <!--header-starts-->
  <header class="clearfix">

    <div class="container"><!--container Start-->

		<div class="Logo_Cont left"><!--Logo_Cont Start-->
                    	
           <a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/index.html"><img src="{{ asset('images/logo.png')}}" alt=""></a>
        
        </div><!--Logo_Cont End-->
		
		<div class="Home_Cont_Right right"><!--Home_Cont_Right Start-->
                    	
            <div class="Home_Cont_Right_Top left"><!--Home_Cont_Right_Top Start-->
                 
				 <div class="Top_Search1 left">Call Us Today! (02) 9017 8413</div>
				 <div class="Top_Search2 right"><input id="tags1" name="" type="text" onclick="this.value='';" onblur="validate_field('phone');" value="Type desired Job Location"></div>
           
        	</div><!--Home_Cont_Right_Top End-->

			<div class="Home_Cont_Right_Bottom left"><!--Home_Cont_Right_Bottom Start-->
				<div class="toggle_menu"><a href="javascript:void(0)">Menu</a></div>
                 <div id="topMenu">
                 	<ul>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/index.html">Home</a></li>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/blog_index.html">Dating Blog</a></li>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/who_we_help.html">Who We Help</a></li>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/why_vital.html">Why Vital</a></li>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/reviews.html">Reviews</a></li>
                 		<li><a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/contact_us.html">Contact Us</a></li>
                 	</ul>
                 </div>
           
        	</div><!--Home_Cont_Right_Bottom End-->
        
        </div><!--Home_Cont_Right End-->

	</div><!--container End-->

  </header>
  <!--header-ends-->

  <div class="section banner_section who_we_help">
  	<div class="container">
  		<h4>Manage Product</h4>
  	</div>
  </div>

  <!-- Content Section Start-->
  <div class="section content_section">
	<div class="container">
		<div class="filable_form_container">
			<form method="POST" action="{{route('product.deleteall')}}">
			{{ csrf_field() }}
			<div class="mange_buttons">
				<ul>
					<!--<li class="search_div">
				 <div class="Search">
				 	<input name="search" type="text" /> 
				 	<input type="submit" class="submit" value="submit">
				 </div>
					</li>-->
					<li><a href="{{ route('product')}}">Create Product</a></li>
					<li><input type="submit" name="submit" id="submit" onClick="return confirm('Please confirm deletion');" value="Delete"></li>
				</ul>
			</div>
			<div class="table_container_block">
				<table width="100%">
					<thead>
						<tr>
						<th width="10%">
							<input type="checkbox" class="checkbox selectall" id="checkbox_sample18" onclick="selectall();"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample18"></label>
						</th>
						<th style="">Product Name <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th style="">Product Image</th>
						<th style="">Product Price</th>
						<th style="">Product Category <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- fetch the product details to listing -start -->
						@foreach($products as $product)
						<tr>
							<td>
								<input type="checkbox" name="checkbox[]" value="{{$product->id}}" class="checkbox" id="checkbox_sample19"> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample19"></label>
							</td>
							<td>{{$product->productname}}</td>
							<td style="text-align:center"> @if($product->productimage!="")<img src="{{asset('/storage/'.$product->productimage)}}" style="width:80px; height:auto;">@else<img src="http://www.weatherforecast.co.uk/blog/wp-content/uploads/2015/01/noimage.jpg" style="width:80px; height:auto;">@endif</td>
							<td style="text-align:right">{{$product->productprice}}</td>
							<td>{{$product->categoryname}}</td>
							<td>
								<div class="buttons">
								  <a  href="{{ route('product.edit',$product->id)}}"  class="btn btn_delete ">Edit</a>
								  <a href="{{ route('product.delete',$product->id)}}" onClick="return confirm('Please confirm deletion');" class="btn btn_edit">Delete</a>
								</div>								
							</td>
						</tr>
						@endforeach
						<!-- fetch the product details to listing -end -->

						<!-- to check the records are available in db or not if not then show record not found -start -->
						@if(count($products)<=0)
							<tr>
								<td colspan=6> <center><b>Record Not Found</b></center> </td>
							</tr>
						@endif	
						<!-- to check the records are available in db or not if not then show record not found -end -->

					</tbody>
				</table>
			</div>
			</form>
			<!-- pagination -start -->
			<div class="pagination_listing">
				<ul>
					<li class="disp">{{$products->links()}}</li>
				</ul>
			</div>
			<!-- pagination -end -->
		</div>
	</div>		
  </div>
  <!-- Content Section End-->




<div class="section clearfix section-colored7"><!--section start--> 
    	
	<div class="container"><!--container Start-->
		
		<div class="Download_Cont_Top_Left left"><!--Download_Cont_Top Start-->
			<img src="{{asset('images/icon5.png')}}" alt=""> <h1 style="display:inline;">FREE: Men Are From Mars</h1> <a href="#">Download Now</a>

		</div><!--Download_Cont_Top End-->	
		
	</div><!--container End-->

</div><!--section End-->




 <!--footer-starts-->
  <footer class="footer_wrapper">

    <div class="container"><!--container Start-->
		
		<div class="Footer_Cont_Top clearfix"><!--Footer_Cont_Top Start-->

			<span class="left"><img src="{{asset('images/foot_logo.png')}}" alt=""></span>
			<p class="right">Shortcut your search to happiness right now. 
Live a life without regrets and take action today!</p>
		</div><!--Footer_Cont_Top End-->
		
		<div class="Footer_Cont_Top2 clearfix"><!--Footer_Cont_Top2 Start-->

			<h1>Call Us Today! (02) 9017 8413</h1>
			 <a href="#">Book an Appointment <img src="{{asset('images/icon7.png')}}" alt=""></a>
 			 <a href="#">Contact a Consultant <img src="{{asset('images/icon6.png')}}" alt=""></a>
		</div><!--Footer_Cont_Top2 End-->
		
		<div class="Footer_Cont_Top3 clearfix"><!--Footer_Cont_Top3 Start-->
			
			<div class="Foot_Link1"><!--Foot_Link1 Start-->

				<h1>CONTACT INFO</h1>

				<div class="Foot_Link2"><!--Foot_Link2 Start-->
					 
				  <span>4/220 George St, Sydney NSW 2000</span>
				  <p>Phone: (02) 9017 8413</p>
				  <p>Email: <a href="mailto:info@syd.vitalpartners.com.au" target="_blank">info@syd.vitalpartners.com.au</a></p>

				</div><!--Foot_Link2 End-->

				<div class="Foot_Link2"><!--Foot_Link2 Start-->
					 
				  <span>Canberra City Act 2600 </span>
				  <p>Phone: (02) 9017 8426</p>
				  <p>Email: <a href="mailto:can@syd.vitalpartners.com.au" target="_blank">can@syd.vitalpartners.com.au</a></p>

				</div><!--Foot_Link2 End-->

			</div><!--Foot_Link1 End-->

			<div class="Foot_Link1"><!--Foot_Link2 Start-->
				<h1>RECENT POSTS</h1>

				<div class="Foot_Link3"><!--Foot_Link3 Start-->
					<ul>
						<li><a href="#">How to Recover After a Bad Date</a></li>
                        <li><a href="#">Review | Vital Partners Review</a></li>
                        <li><a href="#">Review | Vital Partners Review</a></li>
                        <li><a href="#">Review | Vital Partners Derek and Julie</a></li>
                        <li><a href="#">7 Rules for a Happy Relationship | Vital Partners Dating Sydney</a></li>
					</ul>
				</div><!--Foot_Link3 End-->

			</div><!--Foot_Link1 End-->

			<div class="Foot_Link1"><!--Foot_Link2 Start-->
				<h1>RECENT TWEETS</h1>

				<div class="Foot_Link4"><!--Foot_Link4 Start-->
					<ul>
						<li class="left">
							<p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p> 
			             <div class="Page_Link left"><a href="#">http://t.co/hGCgHEU6If</a></div>
						 <div class="Page_Link right"> 1 week ago</div>
					    </li>
                      <li class="left">
							<p>Are you being vulnerable to find love? via offline dating agency Sydney Canberra Vital Partners </p> 
			             <div class="Page_Link left"><a href="#">http://t.co/hGCgHEU6If</a></div>
						 <div class="Page_Link right"> 2 week ago</div>
					    </li>
					</ul>
				</div><!--Foot_Link4 End-->

			</div><!--Foot_Link2 End-->

		
		</div><!--Footer_Cont_Top3 End-->
	
	</div><!--container End-->

    <div class="section clearfix section-colored9"><!--section section-colored9 start--> 
            
        <div class="container"><!--container Start-->
            
          <div class="Foot_Link5 left"><!--Foot_Link5 Start-->
				© VitalPartners.com.au
		  </div><!--Foot_Link5 End-->

			<div class="Foot_Link6 left"><!--Foot_Link5 Start-->
				<a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/contact_us.html">Contact</a> |  <a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/terms_of_use.html">Terms of Use</a> |   <a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/privacy_policy.html">Privacy Policy</a> |  <a href="http://wireframes.php-dev.in/training/v1.2/php/assignment/disclaimer.html">Disclaimer</a>
            </div><!--Foot_Link6 End-->


			<div class="Foot_Link7 right"><!--Foot_Link7 Start-->
				<span>FOLLOW US:</span>

				<ul class="social_media">
					<li><a href="#" class="fb">facebook</a></li>
					<li><a href="#" class="twitter">Twitter</a></li>
					<li><a href="#" class="linkedin">LinkedIn</a></li>
					<li><a href="#" class="you_tube">You Tube</a></li>
					<li><a href="#" class="gplus">googl plus</a></li>
				</ul>


				<!-- <p><a href="#"><img src="images/icon10.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon11.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon12.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon13.png" alt=""></a></p>
                <p><a href="#"><img src="images/icon14.png" alt=""></a></p> -->
			</div><!--Foot_Link7 End-->
            
      </div><!--container End-->
    
    </div><!--section section-colored9 End--> 
	 
    <div class="section section-colored10"><!--section section-colored9 start--> 
            
        <div class="container"><!--container Start-->
			<div class="Foot_Link8 "><!--Foot_Link8 Start-->
			<a href="#">Who Designed This Site?</a> <a href="#">Who  Built This Site?</a>
			</div><!--Foot_Link8 End-->
		</div><!--container End-->
    
    </div><!--section section-colored9 End--> 
  </footer>
  <!--footer-ends--> 

  <!-- Sticky Contact Number Start
  <div class="fixed_contact_number">
  	<div class="container">
  		<div class="contact_number">
  			<span>Call Us Today! (02) 9017 8413</span>
  			<a href="contact_us.html">Conatct Us</a>
  		</div>  		
  	</div>
  </div>
   Sticky Contact Number End-->

</div>
<!--wrapper-starts-->

<script type="text/javascript" src="{{asset('js/jquery_002.js')}}"></script>	
<script type="text/javascript">
	$(document).ready(function(){
		$('.select').each(function(){
		  var title = $(this).attr('title');
		  if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		  $(this).css({'z-index':10,'opacity':0,'-khtml-appearance':'none'}).after('<span class="select">' + title + '</span>').change(function(){
			val = $('option:selected',this).text();
			$(this).next().text(val);
		  })
		});
	});
</script>


<script>
$(document).ready(function(){
    $("#submit").prop("disabled", true); // disabled the delete field
});

//function to select the all checkbox -start
function selectall(){
    
    if($(".selectall").is(":checked")){
     //   alert("hii");
        
        $(".checkbox").prop('checked', true); // to select all checkbox
        $("#submit").prop("disabled", false); // enabled the delete field

    }
    else{
        $(".checkbox").prop('checked', false); // to disselect all checkbox
		$("#submit").prop("disabled", true); // disabled the delete field

    }

}
//function to select all checkbox-end
</script>

</body></html>