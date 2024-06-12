$('#googleLogin').click(function() {
  signInWithProvider(GoogleProvider);
});

$('#githubLogin').click(function() {
  signInWithProvider(GitHubProvider);
});

$('#twitterLogin').click(function() {
  signInWithProvider(TwitterProvider);
});

$('#facebookLogin').click(function() {
  signInWithProvider(FacebookProvider);
});
function signInWithProvider(provider) {
  firebase.auth()
    .signInWithPopup(provider)
    .then((result) => {
      var user = result.user;

      // Extract relevant user data
      var userData = {
        displayName: user.displayName,
        email: user.email,
        photoURL: user.photoURL,
        uid: user.uid
      };

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
      console.error(error);
    });
}
function signOut() {
    window.location.href = '/social_auth_php/index.html';s
}