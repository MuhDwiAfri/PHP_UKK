setInterval(() => {
  const waktu = new Date();
  const jam = waktu.getHours();
  const menit = waktu.getMinutes();
  document.getElementById("jam").innerHTML = jam + " : " + menit;
}, 1000);