function statusChangeCallback(response) {
    if (response.status === 'connected') {
        testAPI()
    } else if (response.status === 'not_authorized') {} else {}
}

function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response)
    })
}

if (st_params.facebook_enable == 'on' && st_params.facebook_app_id)

{
    window.fbAsyncInit = function () {
        FB.init({
            appId: st_params.facebook_app_id,
            cookie: !0,
            xfbml: !0,
            version: 'v2.1'
        });
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response)
        })
    }
}(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs)
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function (response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!'
    })
}
