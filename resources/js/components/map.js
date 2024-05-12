if (document.querySelector("#map")) {
    initMap();

    async function initMap() {
        await ymaps3.ready;

        const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer } = ymaps3;

        const map = new YMap(document.getElementById("map"), {
        location: {
            center: [34.11379250000001, 44.947650204413435],
            zoom: 10,
        },
        });
        map.addChild(new YMapDefaultSchemeLayer());
        map.addChild(new YMapDefaultFeaturesLayer());
    }
}