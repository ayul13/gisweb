@extends('layout.app')
@section('title', $viewData["title"])
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Layers Control Tutorial - Leaflet</title>
	
	<!-- <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" /> -->

    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
	<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="{{asset ('/asset/leaflet/leaflet.css')}}">
	    <script src="{{asset ('/asset/leaflet/leaflet.js')}}"></script>
		<script src="{{asset ('/asset/geojson/leneng.js')}}" type="text/javascript"></script>
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 520px;
			width: 1500px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	
</head>
<body>

<div id='map'></div>

<script>
	const school = L.layerGroup();

	// const mLittleton = L.marker([-8.6935197,116.2179408]).bindPopup('IPDN LOMBOK TENGAH').addTo(school);
	const mDenver = L.marker([-8.7002911,116.2585571]).bindPopup('Pondok Pesantren Sa\'adatuddarain').addTo(school);
	const mAurora = L.marker([-8.7024867,116.2608151]).bindPopup('SDN 1 Leneng').addTo(school);
	const mGolden = L.marker([-8.7028219,116.2584039]).bindPopup('MI NW Leneng').addTo(school);

	const masjid = L.layerGroup();
	const mj1 = L.marker([-8.7025576,116.260738]).bindPopup('Masjid Nurul Islam').addTo(masjid);
	const mj2 = L.marker([-8.701644,116.2657422]).bindPopup('Masjid Agung.<br> Lombok Tengah.').addTo(masjid);
	const mj3 = L.marker([-8.6969975,116.2549193]).bindPopup('Masjid Miftahul Jannah').addTo(masjid);
	// const mj4 = L.marker([-8.696774,116.2467347]).bindPopup('Masjid al-hidayah btn bermis').addTo(masjid);

	const mebel = L.layerGroup();
	const mbl1 = L.marker([-8.7019043,116.2601029]).addTo(mebel).bindPopup('Mebel Murah Hati');
	const mbl2 = L.marker([-8.7019043,116.2601029]).addTo(mebel).bindPopup('UD Meuble Putri');

	// var btn = L.layerGroup();
	// var btn1 = L.marker([-8.7019043,116.2601029]).addTo(btn).bindPopup('BTN Mandalika Leneng');
	// var btn2 = L.marker([-8.6970307,116.2560604]).addTo(btn).bindPopup('Perumahan Permata Klui');

	var makan = L.layerGroup();
	var mkn1 = L.marker([-8.7024729,116.264721]).addTo(makan).bindPopup('Lesehan Taliwang Cakra');
	var mkn2 = L.marker([-8.702836,116.2668501]).addTo(makan).bindPopup('Babanana Praya');
	var mkn3 = L.marker([-8.701364,116.2648803]).addTo(makan).bindPopup('Rizky Pizza');
	var mkn4 = L.marker([-8.7018052,116.2646786]).addTo(makan).bindPopup('Mie Rampok Lombok Praya');
	var mkn5 = L.marker([-8.6957293,116.2648083]).addTo(makan).bindPopup('Kedai Makan Hadin');
	var mkn6 = L.marker([-8.6970079,116.2646789]).addTo(makan).bindPopup('Hadin Fresh Meat Resto');
	var mkn7 = L.marker([-8.6957293,116.2648083]).addTo(makan).bindPopup('RUMAH MAKAN HIDAYAH');
	var mkn8 = L.marker([-8.6955895,116.2624477]).addTo(makan).bindPopup('Rumah Makan Ikhtiar');
		
	var ekspedisi = L.layerGroup();
	var eks1 = L.marker([-8.699512,116.2639942]).addTo(ekspedisi).bindPopup('NINJA XPRESS PRAYA');
	var eks2 = L.marker([-8.701391,116.2651182]).addTo(ekspedisi).bindPopup('JNE Express');
	var eks3 = L.marker([-8.701391,116.2651182]).addTo(ekspedisi).bindPopup('J&T Express Praya');
	var eks4 = L.marker([-8.6945911,116.2627518]).addTo(ekspedisi).bindPopup('SHOPEE EXPRESS Hub Praya');

	kesehatan = L.layerGroup();
	var rs1 = L.marker([-8.699499,116.2568819]).addTo(kesehatan).bindPopup('Rumah Sakit Cahaya Medika');
	var rs2 = L.marker([-8.7019811,116.2644009]).addTo(kesehatan).bindPopup('Klinik Medical Center');
	var rs1 = L.marker([-8.6958253,116.252041]).addTo(kesehatan).bindPopup('APOTEK DIANA FARMA');

	

	const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
	const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
 
	const streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

	const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

	const map = L.map('map', {
		center: [-8.6993554,116.2569187],
		zoom: 16,
		layers: [osm, school, masjid, mebel,makan,kesehatan]
	});

	const baseLayers = {
		'OpenStreetMap': osm,
		'Streets': streets
	};

	const overlays = {
		'school': school,
		'masjid': masjid,
		'mebel':mebel,
		// 'btn':btn
		'rumah makan':makan,
		'ekspedisi':ekspedisi,
		'kesehatan':kesehatan
	};

	const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

	const crownHill = L.marker([-8.7019043,116.2601029]).bindPopup('BTN Mandalika Leneng');
	const rubyHill = L.marker([-8.6970307,116.2560604]).bindPopup('Perumahan Permata Klui');

	const btn = L.layerGroup([crownHill, rubyHill]);
	

	const satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
	layerControl.addBaseLayer(satellite, 'Satellite');
	layerControl.addOverlay(btn, 'btn');

	L.geoJSON([leneng], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		}
	}).addTo(map);

</script>

</body>
</html>
@endsection