document.getElementById('quiz-form').addEventListener('submit', function(e) {
  e.preventDefault(); // Prevent page reload

  let score = 0;
  const total = 3;

  const correctAnswers = {
    q1: 'b',
    q2: 'c',
    q3: 'b'
  };

  for (let q in correctAnswers) {
    const selected = document.querySelector(`input[name="${q}"]:checked`);
    if (selected && selected.value === correctAnswers[q]) {
      score++;
    }
  }

  const resultDiv = document.getElementById('result');
  resultDiv.innerHTML = `
    <div class="score-box">
      <h2>Your Score: ${score} / ${total}</h2>
      <p>👍 ${score === total ? "Excellent!" : "Good job!"} Review the tutorials to boost your score.</p>
    </div>
  `;
});
