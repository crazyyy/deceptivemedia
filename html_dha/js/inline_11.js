
	jQuery(document).ready(function($) {
					localStorage.setItem('smart_nav_last_archive', 'category');
							localStorage.setItem('smart_nav_refer','http://www.deceptivemedia.co.uk/category/projects/portfolio' );
						localStorage.setItem('smart_nav_cat_id', 759);
			localStorage.setItem('smart_nav_cat_name', 'Portfolio');
			sessionStorage.setItem('smart_nav_last_archive', 'category');
							sessionStorage.setItem('smart_nav_refer','http://www.deceptivemedia.co.uk/category/projects/portfolio' );
						sessionStorage.setItem('smart_nav_cat_id', 759);
			sessionStorage.setItem('smart_nav_cat_name', 'Portfolio');
				
		$(window).unload(function(){
			localStorage.removeItem('smart_nav_cat_id');
			localStorage.removeItem('smart_nav_cat_name');
			localStorage.removeItem('smart_nav_last_archive');
			localStorage.removeItem('smart_nav_refer');
		});

	});
