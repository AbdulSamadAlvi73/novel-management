function showLoadingBar() {
  document.getElementById('loading-bar').style.display = 'flex';
}

function hideLoadingBar() {
  document.getElementById('loading-bar').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
  // Simulate a delay to show the loader for a brief moment
hideLoadingBar()
});

window.addEventListener('beforeunload', function () {
  showLoadingBar(); 
});
