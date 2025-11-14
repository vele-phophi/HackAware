document.getElementById("register-form").addEventListener("submit", function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("register.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    document.getElementById("register-result").innerHTML = data;
  })
  .catch(error => {
    document.getElementById("register-result").innerHTML = "❌ Error: " + error;
  });
});
