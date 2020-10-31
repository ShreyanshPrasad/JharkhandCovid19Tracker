$(document).ready(function(){
    $('#reportBtn').on('click', e => {
        const message = $('#comment').val().trim();
        window.location = `https://api.whatsapp.com/send?phone=919504789166&text=${message}`;
    });
});