$(document).ready(function(){

    $('#cep').focusout(function(){
        console.log( $(this).val() )
        let cep = $(this).val();
        procurarEndereco(cep);
    });


});

function procurarEndereco (cep)
{
    cep = cep.replace('-','');
    $.ajax({
        method: 'GET',
        url: 'https://viacep.com.br/ws/'+cep+'/json/', // substitua por qualquer URL real
        async: true,
        dataType: 'json'
    }).done(function (data) {
        console.log(data);
        $('#endereco').val(data.logradouro);
        $('#complemento').val(data.complemento);
        $('#cidade').val(data.localidade);
        $('#estado').val(data.uf);
    });
}

// const messaging = firebase.messaging();

// if ("serviceWorker" in navigator) {
//     navigator.serviceWorker
//         .register("/js/firebase-messaging-sw.js")
//         .then(function(registration) {

//         console.log("Registration successful, scope is:", registration.scope);
//         messaging.getToken({vapidKey: 'BKXGZUSThJMAUZKyvp5VnV21Sv1Rca5t9uYfFP-xmdZhC4QelJ9aZnNkSa9yjlxenagB3lKAwwyjrokYQuRXl3Q', serviceWorkerRegistration : registration })
//             .then((currentToken) => {
//             if (currentToken) {
//                 console.log('current token for client: ', currentToken);

//                 // Track the token -> client mapping, by sending to backend server
//                 // show on the UI that permission is secured
//             } else {
//                 console.log('No registration token available. Request permission to generate one.');

//                 // shows on the UI that permission is required
//             }
//             }).catch((err) => {
//             console.log('An error occurred while retrieving token. ', err);
//             // catch error while creating client token
//             });
//         })
//         .catch(function(err) {
//             console.log("Service worker registration failed, error:"  , err );
//         });
// }

