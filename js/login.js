document.getElementById("login-form").addEventListener("submit", function(event) {
  event.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  // Placeholder logic — replace with Firebase/MySQL integration later
  const result = document.getElementById("login-result");
  result.innerHTML = `<p>✅ Logged in as ${email} (mock login).</p>`;
});
