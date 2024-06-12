// replace your configuration here 
const firebaseConfig = {
  apiKey: "AIzaSyAX0Z9RR1zmK.................",
  authDomain: "social-auth................",
  projectId: "social-auth-87490",
  storageBucket: "social-auth-874................",
  messagingSenderId: "1096733..............",
  appId: "1:10967335547,...........",
  measurementId: "G-.........."
};
firebase.initializeApp(firebaseConfig);

console.log("Firebase started.");

var GoogleProvider = new firebase.auth.GoogleAuthProvider();
var GitHubProvider = new firebase.auth.GithubAuthProvider();
var TwitterProvider = new firebase.auth.TwitterAuthProvider();
var FacebookProvider = new firebase.auth.FacebookAuthProvider();