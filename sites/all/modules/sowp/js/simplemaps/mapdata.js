var simplemaps_worldmap_mapdata = {

	main_settings:{
		//General settings
		width: 'responsive', //or 'responsive'
		background_color: '#F1FBFD',	
		background_transparent: 'yes',
		border_color: '#ffffff',
		pop_ups: 'detect', //on_click, on_hover, or detect
	
		//State defaults
		state_description:   'State description',
		state_color: '#CCC',
		state_hover_color: '#C0DC7D',
		state_url: 'http://simplemaps.com',
		border_size: 1.5,		
		all_states_inactive: 'no',
		all_states_zoomable: 'yes',		
		
		//Location defaults
		location_description:  'Location description',
		location_color: '#CCC',
		location_opacity: 1,
		location_hover_opacity: 1,
		location_url: '',
		location_size: 35,
		location_type: 'circle', // circle, square, image
		location_image_source: 'frog.png', //name of image in the map_images folder		
		location_border_color: '#FFFFFF',
		location_border: 2,
		location_hover_border: 2.5,				
		all_locations_inactive: 'no',
		all_locations_hidden: 'no',
		
		//Labels
		label_color: '#d5ddec',	
		label_hover_color: '#d5ddec',		
		label_size: 22,
		label_font: 'Arial',
		hide_labels: 'no',
		
		//Advanced settings - you probably can ignore these
		div: 'map',
		auto_load: 'yes',		
		url_new_tab: 'no', 
		images_directory: 'default', //e.g. 'map_images/'
		arrow_color: '#3B729F',
		arrow_color_border: '#88A4BC',
		back_image: 'no',   //Use image instead of arrow for back zoom
		initial_back: 'no', //Show back button when zoomed out and do this JavaScript upon click		
		popup_color: 'white',
		popup_opacity: .9,
		popup_shadow: 1,
		popup_corners: 5,
		popup_font: '12px/1.5 Verdana, Arial, Helvetica, sans-serif',
		popup_nocss: 'no', //use your own css		
		initial_zoom: -1,  //-1 is zoomed out, 0 is for the first continent etc	
		initial_zoom_solo: 'no', //hide adjacent states when starting map zoomed in
		link_text: '(Link)',  //Text mobile browsers will see for links
		zoom: 'yes', //use default regions
		zoom_out_incrementally: 'yes',  // if no, map will zoom all the way out on click
		zoom_percentage: .99,
		adjacent_opacity: .3,
		region_opacity: 1,
		region_hover_opacity: .6,			
		fade_time:  .1, //time to fade out
		zoom_time: .5 //time to zoom between regions in seconds
	},


	state_specific:{	
		AE: { 
				name: 'United Arab Emirates',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default' //Note:  You must omit the comma after the last property in an object to prevent errors in internet explorer.
			},

			AF: { 
				name: 'Afghanistan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AL: { 
				name: 'Albania',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AM: { 
				name: 'Armenia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AO: { 
				name: 'Angola',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AR: { 
				name: 'Argentina',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AT: { 
				name: 'Austria',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AU: { 
				name: 'Australia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			AZ: { 
				name: 'Azerbaijan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BA: { 
				name: 'Bosnia-Herzegovina',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BD: { 
				name: 'Bangladesh',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BE: { 
				name: 'Belgium',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BF: { 
				name: 'Burkina Faso',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BG: { 
				name: 'Bulgaria',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BH: { 
				name: 'Bahrain',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BI: { 
				name: 'Burundi',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BJ: { 
				name: 'Benin',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BN: { 
				name: 'Brunei Darussalam',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BO: { 
				name: 'Bolivia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BR: { 
				name: 'Brazil',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BS: { 
				name: 'Bahamas',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BT: { 
				name: 'Bhutan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BW: { 
				name: 'Botswana',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BY: { 
				name: 'Belarus',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			BZ: { 
				name: 'Belize',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CA: { 
				name: 'Canada',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CD: { 
				name: 'Congo',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CF: { 
				name: 'Central African Republic',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CG: { 
				name: 'Congo',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CH: { 
				name: 'Switzerland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CI: { 
				name: 'Ivory Coast',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CL: { 
				name: 'Chile',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CM: { 
				name: 'Cameroon',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CN: { 
				name: 'China',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CO: { 
				name: 'Colombia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CR: { 
				name: 'Costa Rica',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CU: { 
				name: 'Cuba',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CV: { 
				name: 'Cape Verde',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CY: { 
				name: 'Cyprus',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			CZ: { 
				name: 'Czech Republic',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			DE: { 
				name: 'Germany',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			DJ: { 
				name: 'Djibouti',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			DK: { 
				name: 'Denmark',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			DO: { 
				name: 'Dominican Republic',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			DZ: { 
				name: 'Algeria',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			EC: { 
				name: 'Ecuador',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			EE: { 
				name: 'Estonia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			EG: { 
				name: 'Egypt',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			EH: { 
				name: 'Western Sahara',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ER: { 
				name: 'Eritrea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ES: { 
				name: 'Spain',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ET: { 
				name: 'Ethiopia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			FI: { 
				name: 'Finland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			FJ: { 
				name: 'Fiji',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			FK: { 
				name: 'Falkland Islands',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			FR: { 
				name: 'France',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GA: { 
				name: 'Gabon',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GB: { 
				name: 'Great Britain',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GE: { 
				name: 'Georgia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GF: { 
				name: 'French Guyana',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GH: { 
				name: 'Ghana',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GL: { 
				name: 'Greenland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GM: { 
				name: 'Gambia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GN: { 
				name: 'Guinea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GQ: { 
				name: 'Equatorial Guinea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GR: { 
				name: 'Greece',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GS: { 
				name: 'S. Georgia & S. Sandwich Isls.',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GT: { 
				name: 'Guatemala',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GW: { 
				name: 'Guinea Bissau',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			GY: { 
				name: 'Guyana',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			HN: { 
				name: 'Honduras',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			HR: { 
				name: 'Croatia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			HT: { 
				name: 'Haiti',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			HU: { 
				name: 'Hungary',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IC: { 
				name: 'Canary Islands',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ID: { 
				name: 'Indonesia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IE: { 
				name: 'Ireland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IL: { 
				name: 'Israel',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IN: { 
				name: 'India',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IQ: { 
				name: 'Iraq',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IR: { 
				name: 'Iran',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IS: { 
				name: 'Iceland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			IT: { 
				name: 'Italy',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			JM: { 
				name: 'Jamaica',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			JO: { 
				name: 'Jordan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			JP: { 
				name: 'Japan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KE: { 
				name: 'Kenya',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KG: { 
				name: 'Kyrgyzstan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KH: { 
				name: 'Cambodia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KP: { 
				name: 'North Korea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KR: { 
				name: 'South Korea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KW: { 
				name: 'Kuwait',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			KZ: { 
				name: 'Kazakhstan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LA: { 
				name: 'Laos',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},
			
			LB: {
				name: 'Lebanon',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},			
			
			LK: { 
				name: 'Sri Lanka',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LR: { 
				name: 'Liberia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LS: { 
				name: 'Lesotho',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LT: { 
				name: 'Lithuania',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LU: { 
				name: 'Luxembourg',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LV: { 
				name: 'Latvia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			LY: { 
				name: 'Libya',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MA: { 
				name: 'Morocco',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MD: { 
				name: 'Moldavia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ME: { 
				name: 'Montenegro',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MG: { 
				name: 'Madagascar',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MK: { 
				name: 'Macedonia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ML: { 
				name: 'Mali',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MM: { 
				name: 'Myanmar',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MN: { 
				name: 'Mongolia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MR: { 
				name: 'Mauritania',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MW: { 
				name: 'Malawi',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MX: { 
				name: 'Mexico',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MY: { 
				name: 'Malaysia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			MZ: { 
				name: 'Mozambique',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NA: { 
				name: 'Namibia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NC: { 
				name: 'New Caledonia (French)',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NE: { 
				name: 'Niger',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NG: { 
				name: 'Nigeria',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NI: { 
				name: 'Nicaragua',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NL: { 
				name: 'Netherlands',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NO: { 
				name: 'Norway',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NP: { 
				name: 'Nepal',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			NZ: { 
				name: 'New Zealand',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			OM: { 
				name: 'Oman',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PA: { 
				name: 'Panama',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PE: { 
				name: 'Peru',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PG: { 
				name: 'Papua New Guinea',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PH: { 
				name: 'Philippines',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PK: { 
				name: 'Pakistan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PL: { 
				name: 'Poland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PR: { 
				name: 'Puerto Rico',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PS: { 
				name: 'Palestine',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PT: { 
				name: 'Portugal',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			PY: { 
				name: 'Paraguay',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			QA: { 
				name: 'Qatar',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			RO: { 
				name: 'Romania',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			RS: { 
				name: 'Serbia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			RU: { 
				name: 'Russia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			RW: { 
				name: 'Rwanda',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SA: { 
				name: 'Saudi Arabia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SB: { 
				name: 'Solomon Islands',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SD: { 
				name: 'Sudan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SE: { 
				name: 'Sweden',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SI: { 
				name: 'Slovenia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SK: { 
				name: 'Slovak Republic',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SL: { 
				name: 'Sierra Leone',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SN: { 
				name: 'Senegal',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SO: { 
				name: 'Somalia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SR: { 
				name: 'Suriname',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SS: { 
				name: 'South Sudan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SV: { 
				name: 'El Salvador',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SY: { 
				name: 'Syria',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			SZ: { 
				name: 'Swaziland',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TD: { 
				name: 'Chad',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TG: { 
				name: 'Togo',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TH: { 
				name: 'Thailand',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TJ: { 
				name: 'Tajikistan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TL: { 
				name: 'East Timor',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TM: { 
				name: 'Turkmenistan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TN: { 
				name: 'Tunisia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TR: { 
				name: 'Turkey',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TT: { 
				name: 'Trinidad and Tobago',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TW: { 
				name: 'Taiwan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			TZ: { 
				name: 'Tanzania',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			UA: { 
				name: 'Ukraine',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			UG: { 
				name: 'Uganda',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			US: { 
				name: 'United States',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			UY: { 
				name: 'Uruguay',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			UZ: { 
				name: 'Uzbekistan',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			VE: { 
				name: 'Venezuela',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			VN: { 
				name: 'Vietnam',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			VU: { 
				name: 'Vanuatu',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			YE: { 
				name: 'Yemen',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ZA: { 
				name: 'South Africa',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},

			ZM: { 
				name: 'Zambia',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			},
                        
                        XK: {
                                name: 'Kosovo Office',
                                description: 'default',
                                color: 'default',
                                hover_color: 'default',
                                url: 'default'
                            },
                            
			XX: { 
				name: 'Jammu and Kashmir',
				description: 'default',
				color: 'default',
				inactive: 'yes',
				hover_color: 'default',
				url: 'default'
			},
			
			ZW: { 
				name: 'Zimbabwe',
				description: 'default',
				color: 'default',
				hover_color: 'default',
				url: 'default'
			}//Note:  You must omit the comma after the last property in an object to prevent errors in internet explorer.
	},

	
	locations:{ 
		0: { 
			name: 'Paris',
			lat: '48.866666670',
			lng: '2.333333333',
			color: 'default',
			description: 'default',
			url: 'default'
		},

		1: { 
			name: 'Tokyo',
			lat: '35.666666670',
			lng: '139.750000000',
			color: 'default',
			description: 'default',
			url: 'default'
		}
	},
	
	borders:{
		0: { 
			name: "Kosovo",
			path:"m 1102.2181,356.79763 c 0.5294,-0.2112 1.0339,-0.50801 1.5795,-0.66507 0.1655,-0.015 0.3311,-0.0301 0.4966,-0.0451 0.2412,-0.40621 0.7189,-0.71819 0.7435,-1.21625 0.1369,-0.46302 -0.1218,-1.25401 0.5593,-1.26271 0.4044,0.0263 0.7119,0.45452 1.0766,0.64452 0.864,0.61148 1.7281,1.22297 2.5921,1.83444 0.1186,0.24999 0.081,0.69395 0.2971,0.82277 0.4109,0.0171 0.8218,0.0342 1.2327,0.0513 0.2215,0.43031 0.4416,0.86059 0.068,1.27022 -0.2595,0.50535 -0.5191,1.01069 -0.7786,1.51606 -1.1851,0.35969 -2.3733,0.70944 -3.5511,1.09265 -0.1457,0.40354 -0.098,1.14952 -0.3688,1.33167 -0.2994,-0.13489 -0.7582,-0.12751 -0.7406,-0.54515 -0.1037,-0.44428 -0.2074,-0.88856 -0.3111,-1.33284 -0.6738,-0.52812 -1.3476,-1.05624 -2.0214,-1.58436 -0.2914,-0.63739 -0.5827,-1.2748 -0.8741,-1.91219 z",
			color: 'white',
			size: "1",
			dash: '.',			
		},	
		1: { 
			name: "Sudan",
			path:"m 1135.1413,573.78254 1.1589,-1.31346 1.159,-0.23179 0.9271,-3.24502 0.4636,-1.2362 0,-1.31347 c 0.2322,-0.71267 1.0997,-1.63712 1.9315,-2.54966 l 0.6954,-0.77263 2.936,-0.69536 0.5408,1.46799 1.6225,1.54525 1.3135,1.8543 1.2362,1.2362 2.5497,-0.92715 3.8631,0 1.468,1.8543 4.5585,-0.15452 0.077,-0.77263 3.3996,-2.00883 0.5408,-1.08167 0.4636,-1.00441 1.7771,-0.92715 c 1.5682,1.10743 3.4452,2.21485 4.2494,3.32228 l 2.6269,-0.46357 2.4724,-2.54966 1.468,-3.09051 2.5496,-2.31787 -0.618,-4.3267 -1.468,-1.69978 3.6313,-0.15456 2.4724,-1.08168 -0.3863,3.63134 0.6953,5.40837 4.2495,3.70861 0.2318,1.69977 -0.077,1.31347 0.6181,1.46799",
			color: 'gray',
			size: "1",
			dash: '.',			
		},			
		2: { 
			name: "Kashmir",
			path:"m 1403.7369,423.83216 1.639,0 1.0926,-0.3278 0.5464,-1.42045 1.3112,-0.6556 2.076,-0.54632 2.1853,0.65559 3.1687,-0.54633 3.0595,-0.10926 2.5131,0.54632",
			color: 'gray',
			size: "1",
			dash: '.',			
		},		
		3: { 
			name: "Jammu",
			path:"m 1385.271,394.11188 c -0.7978,0.6336 -1.5957,1.26717 -2.3935,1.90076 -1.2223,0.3796 -1.4474,1.7298 -0.6659,2.6884 0.5463,-0.21853 1.0926,-0.43706 1.6389,-0.65559 1.6733,2.27561 3.3465,4.55126 5.0198,6.82686 0.8589,0.92105 -0.4741,1.82162 -0.7584,2.67926 0.6504,1.65986 1.2109,3.35415 1.8981,4.9997 1.2227,2.02051 3.14,3.49237 4.8764,5.05274 l 0.089,-2.9823 -0.8499,-2.31788 -0.7726,-0.30905 -0.9272,-1.54525 0.1546,-2.08609 1.5452,-0.69536 6.1038,1.15894 2.0088,0.30905 1.3134,-1.00442 2.8588,-0.46357",
			color: 'gray',
			size: "1",
			dash: '.',			
		},		
		4: { 
			name: "Korea",
			path: "m 1662.9603,388.19792 c 0.1932,-1.00441 0.3863,-2.00883 0.5795,-3.01324 0.5812,-0.23536 1.1364,-0.64371 1.7996,-0.53494 1.0246,-0.0115 2.0719,0.1459 3.0684,-0.16285 0.3804,-0.17681 1.2027,0.01 1.0508,-0.60464 0.01,-0.46725 0.021,-0.93451 0.031,-1.40176",
			color: 'gray',
			size: "1",
			dash: '.',			
		},
		5: { 
			name: "Somalia",
			path:"m 1234.9213,603.02797 c 0.2563,0.90027 0.8011,-0.50856 1.202,-0.76486 l 4.4799,-0.9834 1.5297,-2.18531 5.2447,-1.96678 4.6984,0.49169 16.7177,-19.72246",
			color: 'gray',
			size: "1",
			dash: '.',			
		},			
		6: { 
			name: "Kashmir-Jammu-China",
			path: "m 1420.0625,415.12502 -1.625,-1.25 -0.75,-1.875 1.4375,-1 -0.125,-0.5625 -0.1875,-0.5625 -0.6875,-0.5 -0.875,-0.1875 -0.5625,0 -0.4375,-0.25 -0.6875,-0.0625 -0.9375,0.25 -0.4375,-0.875 -0.8125,-2.125 -1,-1.0625 -0.3125,-0.875 -0.062,-0.8125 -0.3125,-0.4375",
			color: 'gray',
			size: "1",
			dash: '.',			
		}
	}	

}	//end of simplemaps_worldmap_mapdata


