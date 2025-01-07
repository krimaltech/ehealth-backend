// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyCx0y-siT1mFW4HYHQCRpoZoYJOJOz7xAI",
    authDomain: "ghargharma-doctor-cf9a5.firebaseapp.com",
    projectId: "ghargharma-doctor-cf9a5",
    storageBucket: "ghargharma-doctor-cf9a5.appspot.com",
    messagingSenderId: "604381450402",
    appId: "1:604381450402:web:1aed8549a56b9dbaa1c7fb",
    measurementId: "G-073PD5BK8C"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    const title = payload.title;
    const options = {
        body: playload.body,
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(title, options);
});
