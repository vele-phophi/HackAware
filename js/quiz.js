document.getElementById("quiz-form").addEventListener("submit", function(event) {
  event.preventDefault();

  const answers = {
    q1: "b",
    q2: "c",
    q3: "b"
  };

  let score = 0;
  let total = Object.keys(answers).length;

  for (let q in answers) {
    const selected = document.querySelector(`input[name="${q}"]:checked`);
    if (selected && selected.value === answers[q]) {
      score++;
    }
  }

  const result = document.getElementById("result");
  result.innerHTML = `<h2>Your Score: ${score} / ${total}</h2>`;

  fetch("quiz.php", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ score: score, total: total })
})
.then(res => res.text())
.then(data => {
  result.innerHTML += `<p>${data}</p>`;
});

  if (score === total) {
    result.innerHTML += `<p>🎉 Excellent! You're cybersecurity aware.</p>`;
  } else if (score >= 2) {
    result.innerHTML += `<p>👍 Good job! Review the tutorials to boost your score.</p>`;
  } else {
    result.innerHTML += `<p>⚠️ Let's revisit the lessons and try again.</p>`;
  }
});



