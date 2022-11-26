/* Map Setup */
let peta = L.map('map', {
    zoom: 12,
    center: [-7.271983065391183, 112.71940290601812]
});

/* Basemaps Layers */
let cartoLight = L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>'
});
let cartoDark = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
    subdomains: 'abcd',
    maxZoom: 19
});
let osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(peta);
let googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
let Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; <a href="https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer">Esri</a>'
});

/* Symbols */
function getColor(d) {
    return d > 1500 ? '#7d000d' :
        d > 1200 ? '#960912' :
        d > 900 ? '#af2217' :
        d > 600 ? '#c5501b' :
        d > 300 ? '#e19559' :
        d > 0 ? '#ffe2aa' :
        '#fff6e5';
}

/* Data Layers */
let covid19 = L.geoJson(null, {
    style: function(feature) {
        return {
            color: 'white',
            weight: 1,
            fillColor: getColor(feature.properties.prediksi_positif),
            fillOpacity: 0.8,
            clickable: true
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on({
            mouseover: function(e) {
                let layer = e.target;
                layer.setStyle({
                    weight: 2,
                    color: "#6777EF",
                    opacity: 1
                });
                info.update(layer.feature.properties);
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            },
            mouseout: function(e) {
                covid19.resetStyle(e.target);
                info.update();
            }
        });
    }
});
$.getJSON("webgis/data_ramalan_webgis", function(data) {
    covid19.addData(data);
    peta.addLayer(covid19);
});

/* Layer Control */
let baseLayers = {
    "ESRI Imagery": Esri_WorldImagery,
    "CartoDB Light": cartoLight,
    "CartoDB Dark": cartoDark,
    "Openstreetmap": osm,
    "Google Street": googleStreets
};
let groupedOverlays = {
    "Data": {
        "Prediksi Covid19": covid19,
    }
};
let layerControl = L.control.groupedLayers(baseLayers, groupedOverlays).addTo(peta);
if (!L.Browser.touch) {
    L.DomEvent
        .disableClickPropagation(layerControl._container)
        .disableScrollPropagation(layerControl._container);
} else {
    L.DomEvent.disableClickPropagation(layerControl._container);
}

/* Map Scale */
let scalebar = L.control.scale({ position: 'bottomleft', maxWidth: 150, metric: true }).addTo(peta);

/* Zoom to Extent */
let homebutton = L.easyButton('fa-home fa-lg', function() {
    peta.setView([-7.271983065391183, 112.71940290601812], 12);
}, 'Home Position', { position: 'topleft' });
homebutton.addTo(peta);

// {{Start}} LEGEND
let legenda = L.control.htmllegend({
    position: 'bottomright',
    legends: [{
        name: 'Prediksi Covid19',
        layer: covid19,
        elements: [{
            label: 'Tidak ada',
            html: '',
            style: { 'background-color': '#fff6e5', 'width': '10px', 'height': '10px' }
        }, {
            label: '< 300',
            html: '',
            style: { 'background-color': '#ffe2aa', 'width': '10px', 'height': '10px' }
        }, {
            label: '301 - 600',
            html: '',
            style: { 'background-color': '#e19559', 'width': '10px', 'height': '10px' }
        }, {
            label: '601 - 900',
            html: '',
            style: { 'background-color': '#c5501b', 'width': '10px', 'height': '10px' }
        }, {
            label: '901 - 1200',
            html: '',
            style: { 'background-color': '#af2217', 'width': '10px', 'height': '10px' }
        }, {
            label: '1201 - 1500',
            html: '',
            style: { 'background-color': '#960912', 'width': '10px', 'height': '10px' }
        }, {
            label: '> 1500',
            html: '',
            style: { 'background-color': '#7d000d', 'width': '10px', 'height': '10px' }
        }]
    }],
    collapseSimple: true,
    detectStretched: true,
    collapsedOnInit: true,
    disableVisibilityControls: true,
})
peta.addControl(legenda)
    // {{End}} LEGEND

// Control that shows properties info on hover
let info = L.control({ position: 'bottomleft' });
info.onAdd = function(peta) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};
info.update = function(props) {
    this._div.innerHTML = (props ?
        '<div style="padding: 6px 8px;"><h4> Prediksi ' + props.prediksi_tanggal + '</h4>' +
        '<strong>&nbsp;<i class="fas fa-map-marker-alt"></i>&nbsp; Kecamatan: </strong>' + props.kec + '<br />' +
        '<strong><i class="fas fa-head-side-virus"></i>&nbsp; Kumulatif Konfirmasi: </strong>' + props.prediksi_positif + '<br />' +
        '<strong><i class="fas fa-bed"></i> Perawatan: </strong>' + props.prediksi_perawatan + '<br />' +
        '<strong><i class="fas fa-dizzy"></i>&nbsp; Meninggal: </strong>' + props.prediksi_meninggal + '<br />' +
        '<strong>&nbsp;<i class="fas fa-walking"></i>&nbsp;&nbsp; Sembuh: </strong>' + props.prediksi_sembuh + '</div>' :
        '');
};
info.addTo(peta);