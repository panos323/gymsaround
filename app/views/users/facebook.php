<?php require  APPROOT . '/views/inc/header.php'?>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '526691201172280',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.getLoginStatus(function(response) {
            console.log(response);
            statusChangeCallback(response);
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function statusChangeCallback(response){
        if(response.status === 'connected'){
            console.log('Logged in and authenticated');
            setElements(true);
            testAPI();
        } else {
            console.log('Not authenticated');
            setElements(false);
        }
    }
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    function testAPI(){
        FB.api('/me?fields=name,email,birthday,location,link', function(response){
            console.log(response);
            if(response && !response.error){
                //console.log(response);
                buildProfile(response);
            }
        })
    }
    function buildProfile(user){
        console.log(user);
        let profile = `
          <h3>${user.name}</h3>
          <ul class="list-group">
            <li class="list-group-item">User ID: ${user.id}</li>
            <li class="list-group-item">Email: ${user.email}</li>
          </ul>
        `;
        document.getElementById('profile').innerHTML = profile;
    }
    function setElements(isLoggedIn){
        console.log(isLoggedIn);
        if(isLoggedIn){
            document.getElementById('logout').style.display = 'block';
            document.getElementById('profile').style.display = 'block';
            document.getElementById('feed').style.display = 'block';
            document.getElementById('fb-btn').style.display = 'none';
            document.getElementById('heading').style.display = 'none';
        } else {
            document.getElementById('logout').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('feed').style.display = 'none';
            document.getElementById('fb-btn').style.display = 'block';
            document.getElementById('heading').style.display = 'block';
        }
    }
    function logout(){
        FB.logout(function(response){
            setElements(false);
        });
    }
</script>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SocialAuth</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="logout" href="#" onclick="logout()">Logout</a></li>
                <fb:login-button
                    id="fb-btn"
                    scope="public_profile,email,user_birthday,user_location,user_posts"
                    onlogin="checkLoginState();">
                </fb:login-button>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h3 id="heading">Log in to view your profile</h3>
    <div id="profile"></div>
    <div id="feed"></div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>