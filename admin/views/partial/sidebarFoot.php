</div>
</div>
<script>
    // side navigator bar 
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openBtn');
        const closeBtn = document.getElementById('closeBtn');

        openBtn.addEventListener('click', () => {
            sidebar.classList.add('open');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('open');
        });
    });
</script>