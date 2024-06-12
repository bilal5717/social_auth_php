$('#githubLogin').click(function(){
    firebase.auth()
      .signInWithPopup(GithubProvider)
      .then((result) => {
        var credential = result.credential;
        var token = credential.accessToken;
        var user = result.user;
        
        var userData = {
          displayName: user.displayName,
          email: user.email,
          photoURL: user.photoURL,
          uid: user.uid
        };
        console.log(userData);
        // Send user data to PHP script using AJAX
        $.ajax({
          url: '/social_auth_php/Storage/storeUserData.php',
          method: 'POST',
          data: { userData: JSON.stringify(userData) },
          success: function(response) {
            // Upon successful storage of user data, you can redirect to the user profile page
            window.location.href = '/social_auth_php/pages/Home.php';
          },
          error: function(xhr, status, error) {
            console.error(error); // Handle errors if any
          }
        });
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        console.log(error);
      });
  });
  
  function signOut() {
      // Redirect to login page after signing out
      window.location.href = '/social_auth_php/index.html';
    }
      
  
  