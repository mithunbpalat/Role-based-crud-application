
    </main>

    <footer class="bg-white border-top px-4 py-3 mt-4">
        <div class="d-flex flex-column flex-sm-row justify-content-between
                    align-items-center gap-2 text-secondary small">
            <span>
                &copy; <?= date('Y'); ?> AdminPanel. All rights reserved.
            </span>
            <span>Powered by CodeIgniter 3</span>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('adminSidebar');

        if (menuToggle && sidebar) {
            menuToggle.addEventListener('click', function () {
                sidebar.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (
                    window.innerWidth <= 768 &&
                    !sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target)
                ) {
                    sidebar.classList.remove('show');
                }
            });
        }
    });
</script>

</body>
</html>
