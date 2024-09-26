
var countDownDate = new Date("oct 1, 2023 1:30:00").getTime();

var x = setInterval(function() {

  var counter = document.querySelector("#C_D");
  var bouteen = document.querySelector("#winner");

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  counter.innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  if (distance < 0) {
    bouteen.style.display = "block";
    clearInterval(x);
    document.getElementById("demo").innerHTML = "تم السحب";}}, 1000);