// Nama cache

var CACHE_NAME = 'thedonut-cache-v1';

// Daftar file yang akan disimpan dalam cache
var urlsToCache = [
  '/',
  '/index.html',
  '/styles/main.css',
  '/assets/manifest.js',
  // '/assets/register.js',
  '/img/logo.png'
];

// Install service worker
self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Cache dibuka');
        return cache.addAll(urlsToCache);
      })
  );
});

// Aktifkan service worker
self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          return cacheName !== CACHE_NAME;
        }).map(function(cacheName) {
          return caches.delete(cacheName);
        })
      );
    })
  );
});

// Mengambil konten dari cache ketika offline
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - kembalikan respons dari cache
        if (response) {
          return response;
        }
        // Jika tidak ada dalam cache, kembalikan request dari server
        return fetch(event.request);
      }
    )
  );
});

if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service_worker.js').then(function(registration) {
      console.log('ServiceWorker terdaftar dengan ruang lingkup: ', registration.scope);
    }, function(err) {
      console.log('Pendaftaran ServiceWorker gagal: ', err);
    });
  });
}
