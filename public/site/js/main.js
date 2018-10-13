$(document).ready(function () {

	$('.nav-link').click(function () {
		var id = $(this).attr('id');
		$('.'+id).slideToggle();
	});

	/* Slider Height */
    var winH = $(window).height(),
        navH = $('.navbar').innerHeight();
    $('.slider, .carousel-item').height(winH - navH - 100)   
	
	
	$(function() {
		var owl = $('.owl-carousel').owlCarousel({
		    loop	:true,
		    margin	:10,
		    nav		:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		})

		
		/* animate filter */
		var owlAnimateFilter = function(even) {
			$(this)
			.addClass('__loading')
			.delay(70 * $(this).parent().index())
			.queue(function() {
				$(this).dequeue().removeClass('__loading')
			})
		}

		$('.btn-filter-wrap').on('click', '.btn-filter', function(e) {
			var filter_data = $(this).data('filter');

			/* return if current */
			if($(this).hasClass('btn-active')) return;

			/* active current */
			$(this).addClass('btn-active').siblings().removeClass('btn-active');

			/* Filter */
			owl.owlFilter(filter_data, function(_owl) { 
				$(_owl).find('.item').each(owlAnimateFilter); 
			});
		})
	});

	$('.wrapper').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 400,
           settings: {
              arrows: false,
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }]
	});
	
	$('.btn-search').click(function () {
		$('.search').css('visibility', 'visible');
	});

	$('.btn-close').click(function () {
		$('.search').css('visibility', 'hidden')
	})

	$('#myList a').on('click', function (e) {
		e.preventDefault()
		$(this).tab('show')
	  })

});

