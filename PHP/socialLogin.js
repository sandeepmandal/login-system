/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.fbAsyncInit = function () {
    FB.init({
        appId: '1622657607950612', // Set YOUR APP ID
        channelUrl: 'http://hayageek.com/examples/oauth/facebook/oauth-javascript/channel.html', // Channel File
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true  // parse XFBML
    });


    FB.Event.subscribe('auth.authResponseChange', function (response)
    {
        if (response.status === 'connected')
        {
            document.getElementById("message").innerHTML += "<br>Connected to Facebook";
            //SUCCESS

        }
        else if (response.status === 'not_authorized')
        {
            document.getElementById("message").innerHTML += "<br>Failed to Connect";

            //FAILED
        } else
        {
            document.getElementById("message").innerHTML += "<br>Logged Out";

            //UNKNOWN ERROR
        }
    });

};

function FBLogin()
{

    FB.login(function (response) {
        if (response.authResponse)
        {
            getUserInfo();
        } else
        {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'email,public_profile,user_birthday'});


}

function getUserInfo()
{
    FB.api('/me', function (response) {
        FbUserName = response.name;
        FbUserID = response.id;
        FbUserEmail = response.email;
        //FbUserPic = getPhoto();
        FbUserGender = response.gender;
        FbUserBirthday = response.birthday;
        var date = new Date(response.birthday);
        var d = date.getDate();
        var m = date.getMonth() + 1;
        var y = date.getFullYear();
        var format_date = '' + (m <= 9 ? '0' + m : m) + '/' + (d <= 9 ? '0' + d : d) + '/' + y;
        FbUserBirthday = format_date;
        window.location = "http://eprep.net76.net/DbEntry.php?name=" + FbUserName + "&email=" + FbUserEmail + "&usernm=" + FbUserID + "&pass=" + "FbUser" + "&bdate=" + FbUserBirthday + "&Gender=" + FbUserGender + "&mobile=" + "null";

        /* var str = "<b>Name</b> : " + response.name + "<br>";
         str += "<b>Link: </b>" + response.link + "<br>";
         str += "<b>id: </b>" + response.id + "<br>";
         str += "<b>Email:</b> " + response.email + "<br>";
         str += "<b>Gender:</b> " + response.gender + "<br>";
         str += "<b>Birthday:</b> " + FbUserBirthday + "<br>";
         str += "<button class='btn btn-info' onclick='getPhoto();'>Get Photo</button>&nbsp;";
         str += "<button class='btn btn-primary'  onclick='Logout();'>Logout</button>";
         document.getElementById("status").innerHTML = str;
         document.getElementById("status").innerHTML = "FBBirth " + FbUserBirthday; */
    });
}
function getPhoto()
{
    FB.api('/me/picture?type=normal', function (response) {
        var str = "<br/><b>Pic</b> : <img src='" + response.data.url + "'/>";
        document.getElementById("status").innerHTML = "FB" + str;
        return str;
    });
}
function FBLogout()
{
    FB.logout(function () {
        document.location.reload();
    });
}

// Load the SDK asynchronously
(function (d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

//-------------------------------------------------------------------------//
//Google plus
function GPLogout()
{
    gapi.auth.signOut();
    location.reload();
}
function GPLogin()
{
    var myParams = {
        'clientid': '698261624795-9o4cfnuptepu4dj8g8hdej3kga9ipmmh.apps.googleusercontent.com',
        'cookiepolicy': 'single_host_origin',
        'callback': 'loginCallback',
        'approvalprompt': 'force',
        'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
    };
    gapi.auth.signIn(myParams);
}

function loginCallback(result)
{
    if (result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
        request.execute(function (resp)
        {
            var email = '';
            if (resp['emails'])
            {
                for (i = 0; i < resp['emails'].length; i++)
                {
                    if (resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }

            var str = "Name:" + resp['displayName'] + "<br>";
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";

            str += "URL:" + resp['url'] + "<br>";
            str += "Email:" + email + "<br>";
            document.getElementById("profile").innerHTML = str;
        });

    }

}
function onLoadCallback()
{
    //gapi.client.setApiKey('AIzaSyADaEVdh1ER74i9H6LVAzRuxbodYiA6YZw');
    gapi.client.load('plus', 'v1', function () {
    });
}



