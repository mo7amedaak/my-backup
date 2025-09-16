let timeLeft = 5;
let timer;
let redirectTimeout;

function startCountdown() {
  timer = setInterval(() => {
    let mins = Math.floor(timeLeft / 60);
    let secs = timeLeft % 60;

    if (secs < 10) {
      secs = "0" + secs;
    }

    document.getElementById("timer").innerText = mins + ":" + secs;
    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(timer);
      document.getElementById("timer").style.display = "none";
      document.getElementById("message").style.display = "block";

      redirectTimeout = setTimeout(() => {
        window.location.href = "https://www.amazon.com";
      }, 5000);
    }
  }, 1000);
}

function resetCountdown() {
  clearInterval(timer);
  clearTimeout(redirectTimeout);
  timeLeft = 5;
  document.getElementById("timer").style.display = "block";
  document.getElementById("message").style.display = "none";
  startCountdown();
}

startCountdown();
