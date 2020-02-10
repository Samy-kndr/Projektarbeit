//Hier stehen all seiten die gecached werden sollen
const staticAssets = [
    './',
    './bilder/images_footer/back.png',
    './bilder/images_footer/home.png',
    './bilder/images_footer/location.png',
    './bilder/images_header/profile.png',
    './reg.js',
    './stylesheet_standard.css',
    './stylesheet_index.css',
    './stylesheet_location.css',
    './stylesheet_login.css',
    './stylesheet_regestration.css',
    './stylesheet_training_1_selection.css',
    './stylesheet_training.css',
    './index.html',
    './location.html',
    './notavaiable.html',
    './training_1_selection.html',
    './Stage1.html',
    './training.html'
];

//Eventlistener für das "install" Event
//Wird verwendet um die App zu installieren
self.addEventListener('install', async event => {
    //Neuen Cache anlegen, mit dem Namen "PrAr-static" anlegen
    const cache = await caches.open('PrAr-statisch');
    //Alle in der Konstante staticAssets gelisteten Files werden gecached
    cache.addAll(staticAssets);
});

//Eventlistener für das "fetch" Event
//Um den Abruf und die Anforderung zu regeln und wie der Empfänger eine Antwort behandelt
self.addEventListener('fetch', event => {
    //
    const req = event.request;
    //Konstante 
    const url = new URL(req.url);
    //Wenn beide gleich sind dann wird der Cache verwendet
    if(url.origin === location.origin) {
        event.respondWith(cacheFist(req));
    //Wenn die Inhalte nicht gleich sind dann werden die Daten neu geladen
    } else {
        event.respondWith(networkFirst(req));
    }   
});

//
async function cacheFist(req) {
    //Gibt "undefined" zurück wenn nichts im cache ist oder den Cache
    const cacheResponse = await caches.match(req);
    //Wenn der Cache da ist wird dieser zurückgegeben, ansonsten ist die 
    //Konstante cacheResponse "undefined" und es wird das Internet zum laden genutzt
    return cacheResponse || fetch(req);
}

async function networkFirst(req) {
    //Neuen Cache mit dem Namen "PrAr" anlegen
    const cache = await caches.open('PrAr-dynamisch');
    /***Daten laden**/
    try  {
        //Versuchen die Daten aus dem Internet zu laden
        //und in die Konstante "res" zu schreiben
        const res = await fetch(req);
        //Wenn das Funktioniert hat werden die Daten in den Cache geladen
        cache.put(req, res.clone());
        //Konstante "res" zurückgeben
        return res;
    /***Fehler beim Laden***/
    } catch(error) {
        //Wenn Daten nicht geladen werden können, werden die Daten aus dem
        //Cache zurück gegeben
        return await cache.match(req);
        //const cacheResponse = await caches.match(req);
        //return cachedResponse || await caches.match("./fallback_site.html");
    }
    
}
