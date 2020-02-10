//Registrierung des Service-Workers
if('serviceWorker' in navigator){
    try {
        navigator.serviceWorker.register('service_worker.js');
        console.log('SW succesfully registered!');
    } catch(error) {
        console.log('SW reg failed!')
    }
}