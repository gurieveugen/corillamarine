var gmap;
var markersArray = [];
(function(){

	$.fn.equalHeightColumns = function() {
		var tallest = 0;
		
		$(this).each(function() {
			if ($(this).outerHeight(true) > tallest) {
				tallest = $(this).outerHeight(true);
			}
		});
		
		$(this).each(function() {
			var diff = 0;
			diff = tallest - $(this).outerHeight(true);
			$(this).height($(this).height() + diff);
		});
	};

	$(function(){
		
		$('.btn-m-nav').click(function(){
			$('#header nav').toggleClass('open');
		});
		
		$( '#nav li:has(ul)' ).doubleTapToGo();
		
		/*$('#nav li.noclick > a').click(function(){
			$(this).parent().toggleClass('open');
			return false;
		});*/

		// =========================================================
		// Close button click
		// =========================================================
		$('.close').click(function(e){			
			hideAllBoxes();
			removeBounce();			
			e.preventDefault();	});
		// =========================================================
		// Configure slider
		// =========================================================
		$('.gallery-map').flexslider({
			animation: "slide",
			slideshowSpeed: 10000,
			animationSpeed: 600,
			controlNav: false,
			touch: false,
			itemWidth: 193,
			itemMargin: 2});
		
	});



	google.maps.event.addDomListener(window, 'load', initializeMap);

	
})(jQuery);

function initializeMap() 
{
	var mapOptions = {
		zoom: 2,
		center: new google.maps.LatLng(0, 0)};

	gmap = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	if(gmap_items !== undefined)
	{
		var latlng = first(gmap_items);
		gmap.panTo(new google.maps.LatLng(latlng.lat, latlng.lng));
		for(var i in gmap_items)
		{			
			addMarker(i, new google.maps.LatLng(gmap_items[i].lat, gmap_items[i].lng));
		}
	}
}

function addMarker(id, location) 
{
	markersArray[id] = new google.maps.Marker({
		position: location,
		draggable: true,
   		animation: google.maps.Animation.DROP,
		map: gmap,
		icon: gmap_settings.pin,
		db_id: id});	

	google.maps.event.addListener(markersArray[id], 'click', function(){ toggleBounce(markersArray[id]) });

}

function removeBounce()
{
	for(var i in markersArray)
	{
		markersArray[i].setAnimation(null);
	}
}

function toggleBounce(marker) 
{	
	hideAllBoxes();
	$('.mask').removeClass('hide');
	$('#box-' + marker['db_id']).removeClass('hide');
	$('.gallery-map').removeData("flexslider");
	$('.gallery-map').flexslider({
				animation: "slide",
				slideshowSpeed: 10000,
				animationSpeed: 600,
				controlNav: false,
				touch: false,
				itemWidth: 193,
				itemMargin: 2});

	if (marker.getAnimation() != null) 
	{
		marker.setAnimation(null);
	} 
	else 
	{
		marker.setAnimation(google.maps.Animation.BOUNCE);
	}
}

/**
 * Hide not needed boxe's
 */
function hideAllBoxes()
{
	$('.box').each(function(){
		if(!$(this).hasClass('hide')) $(this).addClass('hide');
	});	
	if(!$('.mask').hasClass('hide')) $('.mask').addClass('hide');
}

/**
 * Get first item
 * @param  array
 * @return item
 */
function first(p)
{
	for(var i in p) return p[i];
}
