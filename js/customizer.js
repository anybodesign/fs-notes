(function($) {
    
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a', '.site-title' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-desc' ).text( to );
		});
	});

	// Site title
    wp.customize('hide_sitetitle', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-title span' ).hide().addClass('screen-reader-text');
            }
            else {
                $( '.site-title span' ).show().removeClass('screen-reader-text');
            }
        });
    });

    // Tagline
    wp.customize('hide_tagline', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-desc' ).hide().addClass('screen-reader-text');
            }
            else {
                $( '.site-desc' ).show().removeClass('screen-reader-text');
            }
        });
    });
    
    // Colors
	var rootCustomProperty = function( setting ) {
		var bStyle = document.createElement( 'style' );
		document.head.appendChild( bStyle );
		setting.bind( function( newval ) {
			bStyle.innerHTML = ':root { --' + setting.id + ': ' + newval + ' }';
		} );
	};
    wp.customize( 'primary_color', rootCustomProperty );
    wp.customize( 'title_color', rootCustomProperty );
    wp.customize( 'btn_text_color', rootCustomProperty );
    wp.customize( 'text_color', rootCustomProperty );
    wp.customize( 'page_color', rootCustomProperty );
    wp.customize( 'sidebar_color', rootCustomProperty );
	
	//White text
    wp.customize('white_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.page-content' ).addClass('white-text');
            }
            else {
                $( '.page-content' ).removeClass('white-text');
            }
        });
    });
    wp.customize('white_sidebar_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.page-sidebar' ).addClass('white-text');
            }
            else {
                $( '.page-sidebar' ).removeClass('white-text');
            }
        });
    });
    wp.customize('white_footer_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '#site_foot' ).addClass('white-text');
            }
            else {
                $( '#site_foot' ).removeClass('white-text');
            }
        });
    });
    wp.customize('white_header_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '#site_head' ).addClass('white-text');
            }
            else {
                $( '#site_head' ).removeClass('white-text');
            }
        });
    });
    wp.customize('white_btn_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.action-btn' ).css('color', '#fff');
            }
            else {
                $( '.action-btn' ).css('color', '#23252B');
            }
        });
    });

	
	// Dark Mode
    wp.customize('dark_mode', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( 'html' ).addClass('dark-mode');
            }
            else {
                $( 'html' ).removeClass('dark-mode');
            }
        });
    });
    
    // Dark Icons
    wp.customize('dark_icons', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.footer-social' ).addClass('dark-icons');
            }
            else {
                $( '.footer-social' ).removeClass('dark-icons');
            }
        });
    });


    // Author
	wp.customize('author_name', function(value) {
        value.bind( function( text ) {
            $('.author-description .footer-title').text( text );
        });
    });
    wp.customize('author_desc', function(value) {
        value.bind( function( text ) {
            $('.author-bio').text( text );
        });
    });
    
    // WP Credits
    wp.customize('display_wp', function( value ){
        value.bind( function( to ) {
            if( to ) {
                $( '.wp-love' ).show();
            }
            else {
                $( '.wp-love' ).hide();
            }
        });
    });
  
    
    // Footer text
    wp.customize('footer_text', function(value) {
        value.bind( function( text ) {
            $('.footer-copyright').text( text );
        });
    });
    
    
})(jQuery);