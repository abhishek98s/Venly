<script defer>
document.querySelector('#logout-btn').addEventListener('click', function() {
  fetch('backend/auth/logout.php', { method: 'POST' })
    .then(() => location.reload())
    .catch(error => console.error('Logout failed:', error));
});
</script>

</body>

</html>