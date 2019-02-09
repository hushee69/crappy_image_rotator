<link rel="stylesheet" type="text/css" href="split.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div id="container">
	<img src="http://imgc.allpostersimages.com/images/P-473-488-90/68/6896/2GOJ100Z/posters/despicable-me-2-minions-movie-poster.jpg" class="roll" />
	<img src="https://i.kinja-img.com/gawker-media/image/upload/gd8ljenaeahpn0wslmlz.jpg" class="roll" />
	<img src="https://i2.cdn.turner.com/cnnnext/dam/assets/140926165711-john-sutter-profile-image-large-169.jpg" class="roll" />
</div>

<script>
	window.onload = function()
	{
		var container = document.querySelector("#container");
		
		var imgs = document.querySelectorAll(".roll");
		var imgs_len = imgs.length;
		
		// initial values
		var initial_degree = 0;
		var initial_pos = 0;
		
		// current values
		var current_degree = 0;
		var current_pos = initial_pos;
		
		// bounding values
		var total_degree = 360;
		var total_pos = window.innerWidth - 50 - (100 * imgs_len);
		
		// direction: left (-1), right (1)
		var direction = 1;
		
		// intitialize
		container.style.marginLeft = current_pos + "px";
		
		for( var i = 0; i < imgs_len; ++i )
		{
			(function(index)
			{
				var cur = imgs[index];
				window.setInterval(function()
				{
					// reset degrees
					if( current_degree >= total_degree )
					{
						current_degree = initial_degree;
					}
					if( current_pos >= total_pos )
					{
						direction = -1;
						console.log(direction);
					}
					else if( current_pos <= initial_pos )
					{
						direction = 1;
						console.log("cur pos = " + current_pos);
					}
					current_degree += 5;
					if( direction > 0 )
					{
						current_pos += 1;			// go right
					}
					else
					{
						current_pos -= 2;			// go left
					}
					cur.style.transform = "rotate(" + current_degree + "deg)";
					container.style.marginLeft = current_pos + "px";
				}, 50);
			})(i);
		}
	}
</script>
